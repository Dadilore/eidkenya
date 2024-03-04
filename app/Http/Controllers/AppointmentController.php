<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Appointments;
use App\http\Controllers\Auth\AuthenticatedSessionController;
use Illuminate\Support\Facades\Auth; // Import the Auth facade

class AppointmentController extends Controller
{
    public function make_appointment(Request $request)
{
    $data = new Appointments;
    $applicationId = Auth::user()->application_id; 

    $data->appointment_date = $request->appointment_date;
    $data->appointment_time = $request->appointment_time;
    $data->appointment_venue = $request->appointment_venue;
    $data->applications_id = $applicationId; // Assign the correct property
    $data->status = 'In progress';

    if (Auth::id()) {
        $data->user_id = Auth::user()->id;
    }

    $data->save();

    return redirect()->back()->with('success', 'Application submitted successfully. Proceed to payment.');
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
        $data=appointments::find($id);
        $data->delete();

        session()->flash('success', 'Appointment submitted successfully.');
        

        return redirect()->back();

    }
}
