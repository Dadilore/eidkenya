<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\models\Appointments;

class AdminController extends Controller
{
    public function AdminDashboard(){

        return view('admin.index');

    } //End Method


    public function AdminLogout(Request $request){
        Auth::guard('web')->logout();

        $request->session()->invalidate();

        $request->session()->regenerateToken();

        return redirect('/login');
    }//End Method


    public function showappointment(){

        $data=appointments::all();
        return view('admin.showappointment',compact('data'));

    } //End Method

    public function approved($id)
    {

        $data=appointments::find($id);
        $data->status='approved';
        $data->save(); 

        return redirect()->back();

    }

    public function cancelled($id)
    {

        $data=appointments::find($id);
        $data->status='cancelled';
        $data->save(); 

        return redirect()->back();

    }


}
    