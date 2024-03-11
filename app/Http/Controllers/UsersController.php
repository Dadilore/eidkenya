<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\models\User;

class UsersController extends Controller
{

    public function view_users(){

        $data=User::all();
        return view('admin.users.view_users',compact('data'));

    } 

    
}
