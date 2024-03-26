<?php

namespace App\Http\Controllers;

use DB;
use App\models\Appointments;
use Illuminate\Http\Request;
use App\models\UserBiometrics;
use Illuminate\Support\Carbon;
use Illuminate\Support\Facades\Auth;
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
        $data = appointments::paginate(5); // You can adjust the number (10) based on your desired items per page.
        return view('admin.appointments.showappointment', compact('data'));
    }
     //End Method

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

    public function index2()
{
    $totalApplications = DB::table('applications')->count();
    $newApplications = \DB::table('applications')->where('application_type', 'New Application')->count();
    $replacementApplications = \DB::table('applications')->where('application_type', 'Replacement Application')->count();
    $changeOfParticulars = \DB::table('applications')->where('application_type', 'Change of Particulars ')->count();

    $totalAppointments = \DB::table('appointments')->count();
    // $totalPayments = \DB::table('mpesa_s_t_k')->count();

    $totalAllUsers = \DB::table('users')->count();
    $totalUser = \DB::table('users')->where('role', 'user')->count();
    $totalAdmin = \DB::table('users')->where('role', 'admin')->count();

    $todayDate = Carbon::now()->format('Y-m-d');
    $thisMonth = Carbon::now()->format('m');
    $thisYear = Carbon::now()->format('Y');

    $totalPickupAppointments = \DB::table('pickupappointments')->count();

    $todayApplications = \DB::table('applications')->whereDate('created_at', $todayDate)->count();
    $thisMonthApplications = \DB::table('applications')->whereMonth('created_at', $thisMonth)->count();
    $thisYearApplications = \DB::table('applications')->whereYear('created_at', $thisYear)->count();

    // Pass all variables to the view
    return view('admin.index', compact('totalApplications', 'totalAppointments', 'totalAllUsers', 'totalUser', 'totalAdmin', 'totalPickupAppointments', 'todayApplications', 'thisMonthApplications', 'thisYearApplications','newApplications','replacementApplications','changeOfParticulars'));
}



}
    