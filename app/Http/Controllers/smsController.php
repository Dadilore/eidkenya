<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Twilio\Rest\Client;

class smsController extends Controller
{
    public function send_sms()
    {
        return view('admin.notifications.send_sms');
    }


    
    public function sendsms(Request $request)
    {
     
        // Format the phone number to E.164 format (+254XXXXXXXXX)
        $receiverPhoneNumber = '+254' . substr($request->phone, -9);

        // Initialize Twilio client using your credentials
        $sid = getenv("TWILIO_SID");
        $token = getenv("TWILIO_TOKEN");
        $sendernumber = getenv("TWILIO_PHONE");
        $twilio = new Client($sid, $token);

        // Send an SMS
        $message = $twilio->messages->create(
            $receiverPhoneNumber,
            [
                "body" => "Your ID is ready for pickup, visit eidkenya.co.ke to book an appointment for picking up your ID ",
                "from" => $sendernumber
            ]
        );

        // Check if the message was sent successfully
        if ($message->sid) {
            return "SMS sent successfully to $receiverPhoneNumber";
        } else {
            return "Failed to send SMS to $receiverPhoneNumber";
        }
    }

    // public function sendsms(Request $request)
    // {
    //     $request->validate([
    //         'phone' => 'required|string',
    //         'message' => 'required|string',
    //     ]);
    
    //     // Format the phone number to E.164 format (+254XXXXXXXXX)
    //     $receiver_phone = '+254' . substr($request->phone, -9);
    
    //     $message = $request->message;
    
    //     $sid = getenv("TWILIO_SID");
    //     $token = getenv("TWILIO_TOKEN");
    //     $sendernumber = getenv("TWILIO_PHONE");
    
    //     $twilio = new Client($sid, $token);
    
    //     $message = $twilio->messages
    //         ->create($receiver_phone, // to
    //             [
    //                 "body" => $message,
    //                 "from" => $sendernumber
    //             ]
    //         );
    
    //     dd("message sent successfully");
    // }



    public function sms()
    {
        $basic  = new \Vonage\Client\Credentials\Basic("712cb6e2", "U1Ny6wg3lCRqp02y");
        $client = new \Vonage\Client($basic);

        $response = $client->sms()->send(
            new \Vonage\SMS\Message\SMS("254743316661", "eIDKenya", 'Your ID is ready for pickup')
        );
        
        $message = $response->current();
        
        if ($message->getStatus() == 0) {
            echo "The message was sent successfully\n";
        } else {
            echo "The message failed with status: " . $message->getStatus() . "\n";
        }
       
    }


}
