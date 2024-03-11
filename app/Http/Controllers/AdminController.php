<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\models\Appointments;
use App\models\UserBiometrics;
use Illuminate\Support\Facades\Artisan;

class AdminController extends Controller
{
    public function AdminDashboard()
    {
        $response = response()->view('admin.index');

        // Add no-cache headers to prevent browser caching
        $response->header('Cache-Control', 'no-store, no-cache, must-revalidate, max-age=0');
        $response->header('Pragma', 'no-cache');
        $response->header('Expires', 'Sat, 01 Jan 2000 00:00:00 GMT');

        return $response;
    }//End Method


    public function AdminLogout(Request $request){
        Auth::guard('web')->logout();

        $request->session()->invalidate();

        $request->session()->regenerateToken();

        return redirect('/login');
    }//End Method


    public function showappointment(){

        $data=appointments::all();
        return view('admin.appointments.showappointment',compact('data'));

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
    // public function paid($id)
    // {

    //     $data=appointments::find($id);
    //     $data->status='paid';
    //     $data->save(); 

    //     return redirect()->back();

    // }

    public function seedUserBiometrics()
    {
        // Run the UserBiometricsSeeder
        Artisan::call('db:seed', ['--class' => 'UserBiometricsSeeder']);

        return redirect()->back()->with('success', 'User Biometrics seeded with demo data.');
    }


}
    