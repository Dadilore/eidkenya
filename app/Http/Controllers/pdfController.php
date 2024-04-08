<?php

namespace App\Http\Controllers;

use App\Models\User;
use App\Models\MpesaSTK;
use Illuminate\Support\Str;
use App\Models\Applications;
use Illuminate\Http\Request;
use Barryvdh\DomPDF\Facade\Pdf;
use Illuminate\Support\Facades\Auth;

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

    public function generate_invoice_pdf(Request $request)
    {
        // Fetch authenticated user's details
        $user = User::findOrFail(Auth::user()->id);

        // Get the application ID from the request
        $applicationId = $request->query('application_id');

        // Fetch the application by its ID
        $application = Applications::findOrFail($applicationId);

        // Check if the user is authorized to download the receipt for this application
        if ($application->user_id != $user->id) {
            // Unauthorized access, redirect with an error message
            return redirect()->route('payment')->with('error', 'Unauthorized access.');
        }

        // Check if the receipt number for this specific application is null
        if ($application->receipt_number === null) {
            // Generate a random receipt number of 10 characters (including both letters and numbers) starting with "eID"
            $receiptNumber = 'eID' . Str::random(7, 'alnum'); // Total length is 10 (3 characters for "eID" and 7 alphanumeric characters)

            // Update the receipt number of the application and save it to the database
            $application->receipt_number = $receiptNumber;
            $application->save();
        } else {
            // Retrieve the receipt number from the database
            $receiptNumber = $application->receipt_number;
        }

        // Check if the user has paid for the application
        $payment = MpesaSTK::where('user_id', $user->id)
            ->latest() // Order by the latest payment
            ->first();

        if (!$payment) {
            // User hasn't paid, redirect to payments page with a message
            return redirect()->route('payment')->with('error', 'Please make the payment first to download the receipt.');
        }

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
