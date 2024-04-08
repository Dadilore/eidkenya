<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Applications;
use App\Models\PersonalDetails;
use App\Models\Birthplaces;
use App\Models\Documents;
use App\http\Controllers\Auth\AuthenticatedSessionController;
use Illuminate\Support\Facades\Auth;

class ApplicationController extends Controller
{
    
        public $totalSteps = 6;
        public $currentStep = 1;
        
        public function newApplication()
    {
        return view('livewire\multi-step-form', [ 'applicationType' => 'new',
        'currentStep' => $this->currentStep,
    ]);
        
    }

    public function replacementApplication()
    {
        return view('livewire.multistepform', [ 
            'applicationType' => 'replacement',
            'currentStep' => $this->currentStep,
        ]);
    }

    public function changeOfParticularsApplication()
    {
        return view('livewire.multistepform', [
            'applicationType' => 'change_of_particulars',
            'currentStep' => $this->currentStep,
        ]);
    }

    public function my_application()
    {
        // Fetch all applications from the applications table for the authenticated user
        $applications = Applications::where('user_id', Auth::user()->id)
                                    ->get();
    
        // Fetch the latest application for the authenticated user
        $latestApplication = Applications::where('user_id', Auth::user()->id)
                                         ->latest()
                                         ->first();
    
        // If no application is found, you may want to handle this case accordingly,
        // for example, by redirecting the user with an appropriate message.
    
        return view('applications.my_application', compact('applications', 'latestApplication'));
    }
    


    public function deleteapplication($id)
    {
        // Find the application record
        $application = Applications::find($id);

        if (!$application) {
            // Handle case where application record doesn't exist
            return redirect()->back()->with('error', 'Application not found.');
        }

        // Delete all personal details records related to the application
        PersonalDetails::where('applications_id', $application->id)->delete();

        // Delete all birthplaces records related to the application
        Birthplaces::where('applications_id', $application->id)->delete();

        // Delete all documents records related to the application
        Documents::where('applications_id', $application->id)->delete();

        // Delete the application record
        $application->delete();

        return redirect()->back()->with('success', 'Application deleted successfully.');
    }


    public function update_application($id)
    {
        $application = Applications::find($id);
        
        $user = Auth::user();

        $data = PersonalDetails::where('applications_id', $application->id)->delete();
    
        return view('applications.update_application', compact('data'));
    }
    
}
