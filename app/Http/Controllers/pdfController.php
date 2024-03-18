<?php

namespace App\Http\Controllers;

use App\Models\User;
use App\Models\Applications;
use Illuminate\Http\Request;
use Barryvdh\DomPDF\Facade\Pdf;

class pdfController extends Controller
{
    public function generate_pdf()
    {
        $users = User::get();
        $data = [
            'title' => 'eIDKenya Users',
            'date' => date('m/d/Y'),
            'users'=>$users
        ];
        $pdf = Pdf::loadView('admin.users.generate_user_pdf', $data);
        return $pdf->download(' eIDKenya users.pdf');
    }

    public function generate_applications_pdf()
    {
        $applications = Applications::get();
        $data = [
            'title' => 'eIDKenya applications',
            'date' => date('m/d/Y'),
            'applications'=>$applications
        ];
        $pdf = Pdf::loadView('admin.applications.generate_applications_pdf', $data);
        return $pdf->download(' eIDKenya applications.pdf');
    }
}
