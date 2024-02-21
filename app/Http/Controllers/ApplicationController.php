<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

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

}
