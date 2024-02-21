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
        $amount = 4;
        $account_number = 'eidkenya';
    
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

        
    
        return $result;
    }
    


    // This function is used to review the response from Safaricom once a transaction is complete
    public function STKConfirm(Request $request)
    {
        $stk_push_confirm = (new STKPush())->confirm($request);
    
        if ($stk_push_confirm) {
            // STK push is confirmed, set success flash message
            session()->flash('success', 'Payment successful. Proceed to book your biometrics capture appointment.');
            
            // Redirect the user to the make_appointment.blade.php view
            return redirect()->route('make_appointment');
        }
    
        // If STK push confirmation fails, set an error flash message
        session()->flash('error', 'Payment failed. Please try again.');
    
        // Redirect the user to an appropriate page
        return redirect()->route('some-error-page');
    }
    
}