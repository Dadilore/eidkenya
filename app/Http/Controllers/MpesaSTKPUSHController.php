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
        // Set the fixed amount (Ksh 1000) and account number ("eidkenya")
        $amount = 1;
        $account_number = 'eIDKenya';

        // Get the phone number from the request
        $phoneno = $request->input('phonenumber');

         // Retrieve the most recent application ID for the authenticated user
         $latestApplicationId = Applications::where('user_id', Auth::user()->id)
         ->latest()
         ->first()
         ->id;

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
                'applications_id' => $latestApplicationId,
            ]);

            // Update the application status to "application_paid" for all applications of the authenticated user
            Applications::where('user_id', $user_id)->update(['application_status' => 'application_paid']);

            return redirect()->route('make_appointment')->with('success', 'Payment successful. Please proceed to book your biometrics capture appointment.');

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
