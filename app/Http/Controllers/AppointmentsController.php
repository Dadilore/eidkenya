<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Rules\ValidAppointmentDate;
use App\Models\Appointments;
use App\Models\Applications;
use App\http\Controllers\Auth\AuthenticatedSessionController;
use Illuminate\Support\Facades\Auth; // Import the Auth facade

class AppointmentsController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        if (Auth::id()) {
            $user_id = Auth::user()->id;

            $latestApplication = Auth::user()->applications()->latest()->first();

            if ($latestApplication) {
                $appoint = $latestApplication->appointments;
                return view('dashboard.appointments.index', compact('appoint'));
            } else {
                // Handle case where user has no applications
                $appoint = collect(); // Set $appoint to an empty collection
            }

            return view('dashboard.appointments.index', compact('appoint'));
        } else {
            return redirect()->back();
        }
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('dashboard.appointments.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        
        $request->validate([
            'appointment_date' => ['required', 'date', new ValidAppointmentDate],
            // other validation rules...
        ]);

        // Get the user's ID
        $userId = Auth::id();

        // Get the latest application for the user
        $latestApplication = Applications::where('user_id', $userId)->latest()->first();

        // If the user has no applications, create a new one
        if (!$latestApplication) {
            $latestApplication = Applications::create([
                'user_id' => $userId,
                'application_status' => 'application_incomplete',
                // Add other fields as needed
            ]);
        }

        // Create a new appointment
        $appointment = new Appointments;
        $appointment->appointment_date = $request->appointment_date;
        $appointment->appointment_time = $request->appointment_time;
        $appointment->appointment_venue = $request->appointment_venue;
        $appointment->status = 'In progress';
        $appointment->user_id = $userId;
        $appointment->applications_id = $latestApplication->id;

        // Update the application status to "biometrics_appointment_booked"
        $latestApplication->update(['application_status' => 'appointment booked']);

        // Save the appointment
        $appointment->save();

        // Use the existing sendappointmentnotification method from HomeController
        // app(HomeController::class)->sendappointmentnotification();

        return redirect()->back()->with('success', 'Appointment submitted successfully. Click the button to view your appointment.');
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        $data = appointments::find($id);
         
        return view('dashboard.appointments.edit', compact('data'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, $id)
    {
         $appointments = appointments::find($id);

        $appointments->appointment_date=$request->appointment_date;
        $appointments->appointment_time=$request->appointment_time;
        $appointments->appointment_venue=$request->appointment_venue;

        $appointments->save();

        return redirect()->back()->with('success', 'You have successfully rescheduled your appointment.');
    }


    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $data = appointments::find($id);

        if (!$data) {
            // Handle case where appointment does not exist
            return redirect()->back()->with('error', 'Appointment not found.');
        }

        $data->delete();

        return redirect()->back()->with('success', 'You have successfully canceled your appointment.');

        return redirect()->back()->with('success', 'You have successfully rescheduled your appointment.');
    }
}
