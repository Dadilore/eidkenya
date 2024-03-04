<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User; // Make sure to use the correct namespace for the User model
use Notification;
use App\Notifications\SendEmailNotification;

class HomeController extends Controller
{
    public function sendnotification()
    {
        // Get the authenticated user
        $user = auth()->user();

        if ($user) {
            $details = [
                'greeting' => 'Hello ' . $user->name,
                'body' => 'Congratulations! We are thrilled to inform you that your ID application with eID Kenya has been successfully submitted and and is being processed.',
                'actiontext' => 'View Application',
                'actionurl' => 'http://127.0.0.1:8000/my_application',
                'lastline' => 'We appreciate your cooperation.',
            ];

            // Send notification to the authenticated user
            Notification::send($user, new SendEmailNotification($details));


        } 
    }
}
