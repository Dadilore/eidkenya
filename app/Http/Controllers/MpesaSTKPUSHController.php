<?php

namespace App\Http\Controllers;

use App\Mpesa\STKPush;
use App\Models\MpesaSTK;
use App\Models\Applications; 
use Iankumu\Mpesa\Facades\Mpesa;//import the Facade
use Illuminate\Http\Request;
use App\http\Controllers\Auth\AuthenticatedSessionController;
use Illuminate\Support\Facades\Auth; // Import the Auth facade
use Illuminate\Support\Facades\Log; 

class MpesaSTKPUSHController extends Controller
{
    public $result_code = 1;
    public $result_desc = 'An error occured';

    // Initiate Stk Push Request
    public function STKPush(Request $request)
    {
        $account_number = 'eIDKenya';

        // Get the phone number from the request
        $phoneno = $request->input('phonenumber');

        $applicationsId = $request->session()->get('application_id');

        if (!$applicationsId) {
            // Handle the case where the application ID is not available
            return redirect()->back()->with('error', 'You Have No application to pay for .');
        }

        // Retrieve the application based on the application ID
        $application = Applications::find($applicationsId);

        if (!$application) {
            // Handle the case where the application is not found
            return redirect()->back()->with('error', 'Application not found.');
        }

        // Determine the amount based on the application type
        switch ($application->application_type) {
            case 'New Application':
                $amount = 1000; // Set the amount to 1 for New Application
                break;
            case 'Replacement Application':
                $amount = 2000; // Set the amount to 2 for Replacement Application
                break;
            case 'Change of Particulars':
                $amount = 2000; // Set the amount to 3 for Change of Particulars
                break;
            // Add more cases if needed for other application types
            default:
                $amount = 1000; // Default to 1 if the application type is not recognized
                break;
        }

       

         // Check if there is a record of payment for the specific application ID in the mpesa_stk table
        $paymentRecord = MpesaSTK::where('applications_id', $applicationsId)->first();

        if ($paymentRecord) {
            // Handle the case where the user has already paid for the application
            return redirect()->back()->with('error', 'You have already paid for the application.');
        }


        // Call the Mpesa STK push API
        $response = Mpesa::stkpush($phoneno, $amount, $account_number);
        $result = json_decode((string)$response, true);
        $user_id = Auth::user()->id;

        // Log the Mpesa response for debugging or further analysis
        Log::info('Mpesa STK Push Response: ' . json_encode($result));

        // Check if the payment was successful or canceled by the user
        if (isset($result['ResponseCode']) && $result['ResponseCode'] == '0') {
            // Payment successful, update the database

            // Uncomment the following lines if you need to store additional data
            $mpesaSTK = MpesaSTK::create([
                'merchant_request_id' => $result['MerchantRequestID'],
                'checkout_request_id' => $result['CheckoutRequestID'],
                'amount' => $amount,
                'phonenumber' => $phoneno,
                'user_id' => $user_id,
                'applications_id' => $applicationsId,
            ]);

            // Update the application status to "application_paid" for the specific application of the authenticated user
            Applications::where('user_id', $user_id)
            ->where('id', $applicationsId)
            ->update(['application_status' => 'paid']);


            // return redirect()->route('make_appointment')->with('success', 'Payment successful. Please proceed to book your biometrics capture appointment.');

            // Redirect to the payment page with the application ID
            return redirect()->route('biometrics_form', ['application_id' => $applicationsId])->with('success', 'Payment successful. Please proceed to book your biometrics capture appointment.');



        } else {
            // Log the cancellation response
            Log::warning('Mpesa STK Push Response: ' . json_encode($result));

            // Payment canceled by the user or encountered an error

            if (isset($result['ResponseCode']) && $result['ResponseCode'] == '1032') {
                // Payment canceled by the user
                return redirect()->back()->with('error', 'Payment canceled by the user.');
            } else {
                // Payment encountered an error
                return redirect()->back()->with('error', 'An error occurred during payment.');
            }
        }
    }


    // Handle webhook callback
    public function handleCallback(Request $request)
    {
        // Log the request for debugging
        Log::info('Mpesa STK Push Webhook Request: ' . json_encode($request->all()));

        // Retrieve the necessary data from the request
        $checkoutRequestID = $request->input('CheckoutRequestID');
        $resultCode = $request->input('ResultCode');
        $resultDesc = $request->input('ResultDesc');

        // Update the MpesaSTK record based on the checkoutRequestID
        $mpesaSTK = MpesaSTK::where('checkout_request_id', $checkoutRequestID)->first();

        if ($mpesaSTK) {
            // Update the MpesaSTK record with the response data
            $mpesaSTK->update([
                'result_code' => $resultCode,
                'result_desc' => $resultDesc
            ]);

            // Log the update
            Log::info('Mpesa STK Push Record Updated: ' . json_encode($mpesaSTK->toArray()));
            Log::info('Mpesa STK Push Webhook Request: ' . json_encode($request->all()));
        } else {
            // Log an error if the record is not found
            Log::error('Mpesa STK Push Record Not Found for Checkout Request ID: ' . $checkoutRequestID);
        }

        // Return a response
        return response()->json([
            'status' => 'success'
        ]);
    }

    


    // This function is used to review the response from Safaricom once a transaction is complete
    public function STKConfirm(Request $request)
    {
        $stk_push_confirm = (new STKPush())->confirm($request);

        if ($stk_push_confirm) {

            $this->result_code = 0;
            $this->result_desc = 'Success';
        }
        return response()->json([
            'ResultCode' => $this->result_code,
            'ResultDesc' => $this->result_desc
        ]);
    }
}
