<?php

namespace App\Http\Controllers;

use App\Mpesa\STKPush;
use App\Models\MpesaSTK;
use App\Models\Applications; 
use Iankumu\Mpesa\Facades\Mpesa;//import the Facade
use Illuminate\Http\Request;
use App\http\Controllers\Auth\AuthenticatedSessionController;
use Illuminate\Support\Facades\Auth; // Import the Auth facade

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
    
        // Call the Mpesa STK push API
        $response = Mpesa::stkpush($phoneno, $amount, $account_number);
        $result = json_decode((string)$response, true);
        $user_id = Auth::user()->id;
        // Uncomment the following lines if you need to store additional data
        $mpesaSTK = MpesaSTK::create([
            'merchant_request_id' => $result['MerchantRequestID'],
            'checkout_request_id' => $result['CheckoutRequestID'],
            'amount' => $amount,
            'phonenumber' => $phoneno,
            'user_id' => $user_id,
        ]);

        // Update the application status to "application_paid" if payment is successful
        if ($mpesaSTK) {
            $user_id = Auth::user()->id;

            // Check if there is a record in the payments table for the authenticated user
            $paymentRecord = $user_id ? MpesaSTK::where('user_id', $user_id)->first() : null;

            if ($mpesaSTK) {
                $user_id = Auth::user()->id;
    
                // Update the application status to "application_paid" for all applications of the authenticated user
                Applications::where('user_id', $user_id)->update(['application_status' => 'application_paid']);
            }
        }

        return redirect()->back()->with('success', 'Payment succesfull. click the button schedule your biometrics capture appointment.');
        // return $result;
        // return redirect()->back();
        // return redirect()->route('make_appointment');
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
