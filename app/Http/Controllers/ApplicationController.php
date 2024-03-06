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
        // Fetch data from the applications table for the authenticated user
        $data = Applications::where('user_id', Auth::user()->id)->get();
    
        return view('modules.my_application', compact('data'));
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
        $data = Applications::find($id);
    
        return view('modules.update_application');
    }
    
}
