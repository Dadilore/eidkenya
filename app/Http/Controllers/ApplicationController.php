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
        $data = applications::all();

        return view('modules.my_application',compact('data'));
    }

    public function deleteapplication($id)
    {
        // Find the application record
        $application = Applications::find($id);

        if (!$application) {
            // Handle case where application record doesn't exist
            return redirect()->back()->with('error', 'Application not found.');
        }

        // Retrieve all personal details records for the authenticated user
        $personalDetails = PersonalDetails::where('user_id', Auth::user()->id)->get();

        // Retrieve all birthplaces records for the authenticated user
        $birthplaces = Birthplaces::where('user_id', Auth::user()->id)->get();

        // Retrieve all documents records for the authenticated user
        $documents = Documents::where('user_id', Auth::user()->id)->get();

        // Delete all personal details records
        foreach ($personalDetails as $personalDetail) {
            $personalDetail->delete();
        }

        // Delete all birthplaces records
        foreach ($birthplaces as $birthplace) {
            $birthplace->delete();
        }

        // Delete all documents records
        foreach ($documents as $document) {
            $document->delete();
        }


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
