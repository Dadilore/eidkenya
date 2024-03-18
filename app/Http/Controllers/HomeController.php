<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;
use App\Models\Appointments;
use Notification;
use App\Notifications\SendEmailNotification;
use App\Notifications\SendAppointmentNotification;

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

    public function sendappointmentnotification()
{
    // Get the authenticated user
    $user = auth()->user();

    if ($user) {

        $appointment = Appointments::where('user_id', $user->id)->first();

        if ($appointment) {
            $appointment_date = $appointment->appointment_date; 
            $appointment_time = $appointment->appointment_time; 
            $appointment_venue = $appointment->appointment_venue; 

            $appointment_details = [
                'greeting' => 'Hello ' . $user->name,
                'body' => "Congratulations! You have successfully booked your biometrics capture appointment on {$appointment_date}  at {$appointment_time} at {$appointment_venue}. Please keep time and arrive 30 mins before the appointment time.",
                'actiontext' => 'View Appointment',
                'actionurl' => 'http://127.0.0.1:8000/myappointment',
                'lastline' => 'We appreciate your cooperation.',
            ];

            // Send notification to the authenticated user
            Notification::send($user, new SendAppointmentNotification($appointment_details));
        } else {
            // Handle case when no appointment is found
            // You can customize the message or take any other action here
        }
    }
}



}
