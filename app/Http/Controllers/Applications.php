<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class Applications extends Controller
{
    //
    function index(){
        $counties = config('counties.counties');
        dd($counties);
        return view('applications');
    }
    function add(Request $request){
        $request->validate([
            'full_name'=>'required',
            'gender'=>'required',
        ]);
    }
}
