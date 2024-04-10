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
    public function showBiometricsForm(Request $request, $application_id)
    {
        $application = Applications::findOrFail($application_id);
    
        // Check if the authenticated user is authorized to view the biometrics form
        if ($application->user_id !== Auth::id()) {
            return redirect()->back()->with('error', 'You are not authorized to access this page.');
            // abort(403, 'Unauthorized'); // Return a 403 Forbidden response
        }
    
        return view('biometrics.make_appointment', ['applications' => $application]);
    }

    public function make_biometrics_appointment(Request $request)
    {
        $request->validate([
            'appointment_date' => ['required', 'date', new ValidAppointmentDate],
            // other validation rules...
        ]);
    
        $userId = Auth::id();

        // Get the application ID from the request
        $applicationId = $request->input('application_id');
    
        // Check if the authenticated user is authorized to make an appointment for the given application
        $application = Applications::findOrFail($applicationId);
        if ($application->user_id !== $userId) {
            return redirect()->back()->with('error', 'You are not authorized to access this page.');
        }

          // Check if the user already has a biometrics appointment for this application
          $existingAppointment = Appointments::where('user_id', $userId)
          ->where('applications_id', $applicationId)
          ->first();
      
            if ($existingAppointment) {
                // If the user already has an appointment, redirect with a message
                return redirect()->route('myappointment')->with('error', 'You already have a biometrics capture appointment.');
            }
      
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

        return redirect()->route('myappointment')->with('success', 'Appointment submitted successfully. Please ensure you avail yourself on time at the appointment venue to get your biometrics captured.');
    }


    public function showPickupForm(Request $request, $application_id)
    {
        // Find the application by ID
        $application = Applications::findOrFail($application_id);

        // Check if the authenticated user is authorized to view the pickup form
        if ($application->user_id !== Auth::id()) {
            return redirect()->back()->with('error', 'You are not authorized to access this page.');
        }

        return view('pickup.pickup_appointment', ['applications' => $application]);
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

        // Check if the authenticated user is authorized to make a pickup appointment for the given application
        if ($applications->user_id !== $userId) {
            return redirect()->back()->with('error', 'You are not authorized to access this page.');
        }

        // Check if the user already has a biometrics appointment for this application
        $existingAppointment = Pickupappointment::where('user_id', $userId)
        ->where('applications_id', $application_id)
        ->first();
    
          if ($existingAppointment) {
              // If the user already has an appointment, redirect with a message
              return redirect()->route('mypickupappointment')->with('error', 'You already have an ID pickup appointment.');
          }

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

        return redirect()->route('mypickupappointment')->with('success', 'Appointment submitted successfully. Please ensure you avail yourself on time at the appointment venue to pick up your ID.');
    }

    public function myappointment()
    {
        if (Auth::check()) {
            $user_id = Auth::id();
    
            // Retrieve all applications of the authenticated user
            $applications = Auth::user()->applications;
    
            // Initialize an empty collection for appointments
            $appointments = collect();
    
            // Iterate over each application and retrieve its appointments
            foreach ($applications as $application) {
                $appointments = $appointments->merge($application->appointments);
            }
    
            return view('biometrics.myappointment', compact('appointments'));
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
