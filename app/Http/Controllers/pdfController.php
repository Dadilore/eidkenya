<?php

namespace App\Http\Controllers;

use App\Models\User;
use App\Models\MpesaSTK;
use Illuminate\Support\Str;
use App\Models\Applications;
use Illuminate\Http\Request;
use Barryvdh\DomPDF\Facade\Pdf;
use Illuminate\Support\Facades\Auth;
use App\Models\UserActivityLog;

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

        $applicationTypes = Applications::select('application_type')
        ->selectRaw('COUNT(*) as count')
        ->selectRaw('SUM(CASE WHEN application_status = "ID Collected" THEN 1 ELSE 0 END) as completed')
        ->selectRaw('SUM(CASE WHEN application_status != "ID Collected" THEN 1 ELSE 0 END) as uncompleted')
        ->groupBy('application_type')
        ->get();
        $totalCompleted = $applicationTypes->sum('completed');
        $totalUncompleted = $applicationTypes->sum('uncompleted');
        $totalApplications = $totalCompleted + $totalUncompleted;


        $data = [
            'title' => 'Application Distribution Report',
            'date' => date('m/d/Y'),
            'applications'=>$applications,
            'applicationTypes'=>$applicationTypes,
            'totalCompleted'=>$totalCompleted,
            'totalUncompleted'=>$totalUncompleted,
            'totalApplications'=>$totalApplications
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

        // Check if there is a payment associated with the specific application ID
        $payment = MpesaSTK::where('applications_id', $applicationId)->first();

        if (!$payment) {
            // No payment found for this application, redirect to payments page with a message
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


    public function generate_log(Request $request)
    {
        
        // Get the selected month and year from the request (default to current month and year)
        $selectedMonth = $request->input('month', date('m'));
        $selectedYear = $request->input('year', date('Y'));

        // Filter logs for the specified month and year
        $logs = UserActivityLog::whereYear('created_at', $selectedYear)
            ->whereMonth('created_at', $selectedMonth)
            ->get();

        $data = [
            'title' => 'User Activity Log',
            'date' => date('m/d/Y'),
            'logs' => $logs,
        ];

        $pdf = Pdf::loadView('admin.logs.generate_log', $data);
        return $pdf->download("eIDKenya_userslog_{$selectedYear}_{$selectedMonth}.pdf");
    }



    
    







}
