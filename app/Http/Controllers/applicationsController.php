<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\models\Applications;

class ApplicationsController extends Controller
{
    public function view_applications(){

        $data = Applications::paginate(5); // Adjust the number (10) based on your desired items per page.
        return view('admin.applications.view_applications', compact('data'));

    }

    public function add_application(){
        return view('admin.applications.add_application');
    }
}
