<?php

namespace App\Http\Controllers;

use App\Models\MpesaSTK;
use Illuminate\Http\Request;
use Iankumu\Mpesa\Facades\Mpesa;

class paymentsController extends Controller
{
    public function view_payments(){

        $data = MpesaSTK::paginate(5); // Adjust the number (10) based on your desired items per page.
        return view('admin.payments.view_payments', compact('data'));

    }
}
