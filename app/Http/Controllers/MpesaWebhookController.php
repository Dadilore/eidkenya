<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\MpesaSTK;
use Illuminate\Support\Facades\Log;

class MpesaWebhookController extends Controller
{
    public function handleCallback(Request $request)
    {
        // Get the JSON data from the request
        $jsonData = $request->getContent();
        
        // Decode the JSON data
        $data = json_decode($jsonData, true);
        
        // Log the received data for debugging
        Log::info('Mpesa Callback Data: ' . $jsonData);
        
        // Process the data
        if (isset($data['Body']['stkCallback'])) {
            $callbackData = $data['Body']['stkCallback'];
            $resultCode = $callbackData['ResultCode'];
            $merchantRequestId = $callbackData['MerchantRequestID'];
            $checkoutRequestId = $callbackData['CheckoutRequestID'];
            
            // Check if the payment was successful
            if ($resultCode == 0) {
                $mpesaReceiptNumber = $callbackData['CallbackMetadata']['Item'][1]['Value']; // MpesaReceiptNumber
                $phoneNumber = $callbackData['CallbackMetadata']['Item'][4]['Value']; // PhoneNumber
                
                // Update the database with successful payment
                MpesaSTK::create([
                    'merchant_request_id' => $merchantRequestId,
                    'checkout_request_id' => $checkoutRequestId,
                    'mpesa_receipt_number' => $mpesaReceiptNumber,
                    'phone_number' => $phoneNumber,
                    'status' => 'success', // You might need to adjust this based on your database schema
                ]);
                
                // Redirect the user to the appointments page
                return redirect()->route('make_appointment')->with('success', 'Payment successful. Please proceed to make your appointments.');
            } else {
                // Payment was not successful
                // Log the unsuccessful payment
                Log::warning('Mpesa Payment Unsuccessful. ResultCode: ' . $resultCode);
                
                // Redirect the user back with an error message
                return redirect()->back()->with('error', 'Payment unsuccessful. Please try again.');
            }
        } else {
            // Invalid callback data
            Log::error('Invalid Mpesa Callback Data');
            return response()->json(['error' => 'Invalid Callback Data'], 400);
        }
    }
}
