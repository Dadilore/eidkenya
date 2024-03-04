<?php

namespace App\Http\Controllers;

use App\Mpesa\STKPush;
use App\Models\MpesaSTK;
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
        MpesaSTK::create([
            'merchant_request_id' => $result['MerchantRequestID'],
            'checkout_request_id' => $result['CheckoutRequestID'],
            'amount' => $amount, // Use the previously defined $amount variable
            'phonenumber' => $phoneno, // Using the retrieved phone number
            'user_id' => $user_id, // Replace $user_id with the actual user ID
        ]);

        
        // return $result;
        return redirect()->back();
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
