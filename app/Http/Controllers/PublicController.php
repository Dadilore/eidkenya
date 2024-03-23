<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class PublicController extends Controller
{
    public function index(){
        return view('index');
    }
    public function requirements(){
        return view('requirements');
    }
    public function about_us(){
        return view('about_us');
    }
}
