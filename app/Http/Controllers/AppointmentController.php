<?php

namespace App\Http\Controllers;

use App\Models\Applications;
use App\Models\Appointments;
use Illuminate\Http\Request;
use App\Models\Pickupappointment;
use App\Rules\ValidAppointmentDate;
use App\http\Controllers\Auth\AuthenticatedSessionController;
use Illuminate\Support\Facades\Auth; // Import the Auth facade


class AppointmentController extends Controller
{

    public function make_appointment(Request $request)
    {
        $request->validate([
            'appointment_date' => ['required', 'date', new ValidAppointmentDate],
            // other validation rules...
        ]);
    
        // Get the user's ID
        $userId = Auth::id();
    
        // Get the application ID from the request
        $applicationId = $request->input('application_id');
    
        // Create a new appointment
        $appointment = new Appointments;
        $appointment->appointment_date = $request->appointment_date;
        $appointment->appointment_time = $request->appointment_time;
        $appointment->appointment_venue = $request->appointment_venue;
        $appointment->status = 'In progress';
        $appointment->user_id = $userId;
        $appointment->applications_id = $applicationId; // Use the application ID from the request
    
        // Save the appointment
        $appointment->save();
    
        // Update the application status to "biometrics_appointment_booked"
        Applications::where('id', $applicationId)->update(['application_status' => 'biometrics appointment booked']);
    
        // Use the existing sendappointmentnotification method from HomeController
        // app(HomeController::class)->sendappointmentnotification();
    
        return redirect()->back()->with('success', 'Appointment submitted successfully. Please ensure you avail yourself on time at the appointment venue to get your biometrics captured.');
    }
    


    public function make_pickup_appointment(Request $request, $application_id)
    {
        $request->validate([
            'appointment_date' => ['required', 'date', new ValidAppointmentDate],
            // other validation rules...
        ]);

        // Get the user's ID
        $userId = Auth::id();

        // Find the application by ID
        $applications = Applications::findOrFail($application_id);

        // Create a new pickup appointment
        $appointment = new Pickupappointment;
        $appointment->appointment_date = $request->appointment_date;
        $appointment->appointment_time = $request->appointment_time;
        $appointment->appointment_venue = $request->appointment_venue;
        $appointment->status = 'In progress';
        $appointment->user_id = $userId;
        $appointment->applications_id = $applications->id; // Use the fetched application_id

        // Update the application status to "pickup appointment booked"
        $applications->update(['application_status' => 'pickup appointment booked']);

        // Save the appointment
        $appointment->save();

        // Redirect back with success message
        return redirect()->back()->with('success', 'Appointment submitted successfully. Please ensure you avail yourself on time at the appointment venue to pick up your ID.');
    }

    public function showPickupForm(Request $request,$application_id)
    {
        $application = Applications::findOrFail($application_id);
        return view('pickup.pickup_appointment', ['applications' => $application]);

    }






    public function myappointment()
    {
        if (Auth::id()) {
            $user_id = Auth::user()->id;

            $latestApplication = Auth::user()->applications()->latest()->first();

            if ($latestApplication) {
                $appoint = $latestApplication->appointments;
                return view('biometrics.myappointment', compact('appoint'));
            } else {
                // Handle case where user has no applications
                $appoint = collect(); // Set $appoint to an empty collection
            }

            return view('biometrics.myappointment', compact('appoint'));
        } else {
            return redirect()->back();
        }
    }


    public function mypickupappointment()
    {
        // Fetch data from the applications table for the authenticated user
        $appoint = pickupappointment::where('user_id', Auth::user()->id)->get();
    
        return view('pickup.mypickupappointment', compact('appoint'));
    }


    public function cancel_appoint($id)
    {
        $data = appointments::find($id);

        if (!$data) {
            // Handle case where appointment does not exist
            return redirect()->back()->with('error', 'Appointment not found.');
        }

        $data->delete();

        return redirect()->back()->with('success', 'You have successfully canceled your appointment.');
    }

    public function delete_appoint($id)
    {
        $data = pickupappointment::find($id);

        if (!$data) {
            // Handle case where appointment does not exist
            return redirect()->back()->with('error', 'Appointment not found.');
        }

        $data->delete();

        return redirect()->back()->with('success', 'You have successfully canceled your appointment.');
    }

    public function reschedule_appointment($id)
    {
        $data = appointments::find($id);
         
        return view('biometrics.reschedule_appointment', compact('data'));

    }

    public function edit_appointment(Request $request , $id)
    {
        $appointments = appointments::find($id);

        $appointments->appointment_date=$request->appointment_date;
        $appointments->appointment_time=$request->appointment_time;
        $appointments->appointment_venue=$request->appointment_venue;

        $appointments->save();

        return redirect()->back()->with('success', 'You have successfully rescheduled your appointment.');

    }

    public function pickup_reschedule($id)
    {
        $data = pickupappointment::find($id);
         
        return view('pickup.pickup_reschedule', compact('data'));

    }

    public function edit_pickup(Request $request , $id)
    {
        $appointments = pickupappointment::find($id);

        $appointments->appointment_date=$request->appointment_date;
        $appointments->appointment_time=$request->appointment_time;
        $appointments->appointment_venue=$request->appointment_venue;

        $appointments->save();

        return redirect()->back()->with('success', 'You have successfully rescheduled your appointment.');

    }

}
