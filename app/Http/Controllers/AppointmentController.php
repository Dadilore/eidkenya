<?php

namespace App\Http\Controllers;

use App\Rules\ValidAppointmentDate;
use Illuminate\Http\Request;
use App\Models\Appointments;
use App\Models\Applications;
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

        $data = new Appointments;
        // $applicationsId = Auth::user()->application_id; 

        $data->appointment_date = $request->appointment_date;
        $data->appointment_time = $request->appointment_time;
        $data->appointment_venue = $request->appointment_venue;
        $data->status = 'In progress';

        if (Auth::id()) {
            $data->user_id = Auth::user()->id;
        }

        // Update the application status to "biometrics_appointment_booked"
        Applications::where('user_id', Auth::user()->id)
        ->update(['application_status' => 'biometrics_appointment_booked']);


        $data->save();

        return redirect()->back()->with('success', 'Appointment submitted successfully. click the button to view your appointment.');
    }



    public function myappointment()
    {
        if(Auth::id())
        {
            $user_id = Auth::user()->id;

            $appoint=appointments::where('user_id',$user_id)->get();

            return view('modules.myappointment',compact('appoint'));
        }
        else
        {
            return redirect()->back();
        }
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

}
