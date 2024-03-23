<?php

namespace App\Http\Controllers\admin;

use App\Http\Controllers\Controller;

use App\Models\User;
use App\Models\County;
use App\Models\SubCounty;
use App\Models\PersonalDetails;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

use Freshbitsweb\Laratables\Laratables;
use App\Laratables\UserLaratable;


class AdminController extends Controller
{
    public function index(){

        $users = User::all();

        return view('admin.new_index', [
            'users' => $users,
        ]);

    } 
    public function users(){
        
        if (request()->ajax()) {
            return Laratables::recordsOf(User::class, UserLaratable::class);
        }

        return view('admin.users.index');

    } 

}
    