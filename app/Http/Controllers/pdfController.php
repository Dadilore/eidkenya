<?php

namespace App\Http\Controllers;

use App\Models\User;
use App\Models\Applications;
use Illuminate\Http\Request;
use Barryvdh\DomPDF\Facade\Pdf;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Str;

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

    public function generate_invoice_pdf()
    {
        // Fetch authenticated user's details
        $user = User::findOrFail(Auth::user()->id);
    
        // Fetch the first application for the authenticated user
        $application = Applications::where('user_id', $user->id)
        ->latest() // Order by the latest application
        ->first();

    
        // Generate a random receipt number of 10 characters (including both letters and numbers) starting with "eID"
        $receiptNumber = 'eID' . Str::random(7, 'alnum'); // Total length is 10 (3 characters for "eID" and 7 alphanumeric characters)
    
        // Update the receipt number of the application
        $application->receipt_number = $receiptNumber;
        $application->save(); // Save the changes to the database
    
        // Prepare data for the PDF view
        $data = [
            'title' => 'eIDKenya Invoice',
            'date' => date('m/d/Y'),
            'user' => $user,
            'application' => $application,
            'receiptNumber' => $receiptNumber // Pass the receipt number to the view
        ];
    
        // Load the PDF view with the data
        $pdf = Pdf::loadView('applications.generate_invoice_pdf', $data);
    
        // Download the generated PDF
        return $pdf->download('eIDKenya_invoice.pdf');
    }
    






}
