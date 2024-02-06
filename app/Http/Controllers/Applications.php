<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class Applications extends Controller
{
    //
    function index(){
        return view('applications');
    }
    function add(Request $request){
        $request->validate([
            'full_name'=>'required',
            'gender'=>'required',
        ]);
    }
}
