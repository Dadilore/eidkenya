<?php

namespace App\Http\Controllers;

use Notification;
use App\Models\User;
use App\Models\Applications;
use App\Models\Appointments;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Mail;
use App\Notifications\SendEmailNotification;
use App\Notifications\sendPickupNotification;
use App\Notifications\SendAppointmentNotification;
use App\Mail\ContactMail;
use App\Models\UserActivityLog;

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


    public function sendpickupnotification($applicationId)
    {
        // Get the application details by ID
        $application = Applications::findOrFail($applicationId);

        // Update the application status to "ready for pickup"
        $application->update(['application_status' => 'ready for pickup']);

        // Get the user associated with the application
        $user = User::findOrFail($application->user_id);

        // Log activity - sent pickup email to user
        $log = new UserActivityLog();
        $log->user_id = auth()->id(); // Assuming an admin is sending the notification
        $log->surname = auth()->user()->surname;
        $log->email = auth()->user()->email;
        $log->phone = auth()->user()->phone;
        $log->status = auth()->user()->status;
        $log->role = auth()->user()->role;
        $log->modify_user = 'Sent pickup email to user id ' . $user->id . ' on application ID ' . $application->id;
        $log->save();

        // Send email notification to the user
        if ($user) {
            $pickup_details = [
                'greeting' => 'Hello ' . $user->name,
                'body' => 'Congratulations! We are thrilled to inform you that your ID is ready for pickup, log into eIDKenya to make an ID pickup Appointment.',
                'actiontext' => 'Make Pickup appointment',
                'actionurl' => route('pickup_form', ['application_id' => $application->id]),
                'lastline' => 'We appreciate your cooperation.',
            ];

            // Send notification to the user
            Notification::send($user, new sendPickupNotification($pickup_details));
        }

        // Redirect back or return response
        return redirect()->back()->with('success', 'Email notification sent successfully.');
    }


    public function sendEmail(Request $request)
    {
        // Validate the form data
        $request->validate([
            'name' => 'required',
            'email' => 'required|email',
            'subject' => 'required',
            'message' => 'required',
        ]);

        // Send the email
        Mail::to('augustineokun7@gmail.com')->send(new ContactFormMail($request->all()));

        // Redirect back with a success message
        return redirect()->back()->with('success', 'Your message has been sent. Thank you!');
    }

    public function sendMessage(Request $request)
    {
        $this->validate($request, [
            'name' => 'required',
            'email' => 'required|email',
            'subject' => 'required',
            'message' => 'required',
        ]);

        $data = [
            'name' => $request->name,
            'email' => $request->email,
            'subject' => $request->subject,
            'message' => $request->message,
        ];

        Mail::to('augustineokun7@gmail.com')->send(new ContactMail($data));

        return redirect()->back()->with('success', 'Your message has been sent. Thank you!');
    }

    




}
