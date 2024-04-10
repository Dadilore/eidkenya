<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\models\Applications;
use App\Models\User;
use App\Models\UserActivityLog;

class ApplicationsController extends Controller
{
    public function view_applications4(Request $request)
    {
        $search = $request->query('search');
    
        $data = User::join('applications', 'users.id', '=', 'applications.user_id')
            ->select('applications.*', 'users.name as name', 'users.surname as surname', 'users.middle_name as middle_name', 'users.email as email')
            ->where('applications.application_type', 'New Application');
    
        if ($search) {
            $data->where(function ($query) use ($search) {
                $query->where('surname', 'like', '%' . $search . '%')
                    ->orWhere('middle_name', 'like', '%' . $search . '%')
                    ->orWhere('name', 'like', '%' . $search . '%');
            });
        }
    
        $data = $data->paginate(5);
    
        return view('admin.applications.view_applications', compact('data'));
    }
    
    


    public function view_applications() {
        $data = Applications::join('users', 'applications.user_id', '=', 'users.id')
                            ->select('applications.*', 'users.name as name', 'users.surname as surname', 'users.middle_name as middle_name', 'users.email as email')
                            // ->where('applications.application_type', 'New Application')
                            ->paginate(5); // Adjust the number (5) based on your desired items per page.
        
        return view('admin.applications.view_applications', compact('data'));
    }
            
    

    public function add_application(){
        return view('admin.applications.add_application');
    }


    public function updateStatus(Request $request, $applicationId)
    {
        // Find the application by ID
        $application = Applications::findOrFail($applicationId);

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
         $log->modify_user = 'completed application for user ID ' . $user->id . ' and application ID ' . $application->id;
         $log->save();

        // Update the status column
        $application->application_status = 'ID collected'; // Set the desired status
        $application->save();

        // Redirect back or wherever you need
        return redirect()->back()->with('success', 'application completed succesfully');
    }
}
