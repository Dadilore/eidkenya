<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\models\Applications;
use App\Models\User;

class ApplicationsController extends Controller
{
    public function view_applications4(Request $request)
    {
        $search = $request->query('search');
    
        $data = Applications::join('users', 'applications.user_id', '=', 'users.id')
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
}
