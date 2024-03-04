<?php

namespace App\Livewire;

use Livewire\Component;
use Livewire\WithFileUploads;
use App\Models\Birthplaces;
use App\Models\PersonalDetails;
use App\Models\Documents;
use App\Models\Applications;
use App\http\Controllers\Auth\AuthenticatedSessionController;
use Illuminate\Support\Facades\Auth;
use RealRashid\SweetAlert\Facades\Alert; 
use App\Http\Controllers\HomeController;

class UpdateApplication extends Component
{
    use WithFileUploads;

    public $user_id;
    public $gender;
    public $phone;
    public $fathers_name;
    public $mothers_name;
    public $marital_status;
    public $husbands_names;
    public $husbands_id_number;
    public $occupation;
    public $telephone_number;
    public $email;
    public $district_of_birth;
    public $tribe;
    public $clan;
    public $family;
    public $home_district;
    public $division;
    public $constituency;
    public $location;
    public $sub_location;
    public $village;
    public $home_address;
    public $birth_certificate_number;
    public $passport_number;
    public $parents_id_number;
    public $certificate_of_registration_number;
    public $birth_certificate;
    public $passport_photo;
    public $fathers_id_card_front;
    public $fathers_id_card_back;
    public $mothers_id_card_front;
    public $mothers_id_card_back;
    public $application_status;
    public $terms;

    public $totalSteps = 4;
    public $currentStep = 1;

    public $counties;

    public function mount()
    {
        $this->currentStep = 1;
        $this->user_id = Auth::user()->id;
        $this->counties = config('counties.counties');
    }

    public function render()
    {
        return view('livewire.update-application');
    }

    public function increaseStep()
    {
        $this->resetErrorBag();
        $this->validateData();


        $this->currentStep++;
        if ($this->currentStep > $this->totalSteps) {
            $this->currentStep = $this->totalSteps;
        }
    }

    public function decreaseStep()
    {
        $this->resetErrorBag();
        $this->currentStep--;
        if ($this->currentStep < 1) {
            $this->currentStep = 1;
        }
    }

    public function validateData()
    {
        // Add your validation rules here

        // if ($this->currentStep == 2) {
        //     $this->validate([
        //         'phone' => 'required',
        //         'email' => 'required|email',
        //         'marital_status' => 'required',
        //         'occupation' => 'required|string',
        //         'fathers_name' => 'required|string',
        //         'mothers_name' => 'required|string',
        //     ]);
        // } elseif ($this->currentStep == 3) {
        //     $this->validate([
        //         'district_of_birth' => 'required|string',
        //         'clan' => 'required|string',
        //         'family' => 'required',
        //         'home_district' => 'required|string',
        //         'division' => 'required|string',
        //         'constituency' => 'required',
        //         'location' => 'required|string',
        //         'sub_location' => 'required|string',
        //         'village' => 'required|string',
        //         'home_address' => 'required',
        //     ]);
        // } elseif ($this->currentStep == 4) {
        //     $this->validate([
        //         'birth_certificate_number' => 'string',
        //         'passport_number' => 'string',
        //         'parents_id_number' => 'string',
        //         'certificate_of_registration_number' => 'string',

        //         'birth_certificate' => 'required|string',
        //         'fathers_id_card_front' => 'required|string',
        //         'fathers_id_card_back' => 'required',
        //         'mothers_id_card_front' => 'required|string',
        //         'mothers_id_card_back' => 'required|string',
        //     ]);
        // } 
    }

    public function getOldDetails()
{
    $user = Auth::user();

    $personalDetails = PersonalDetails::where('user_id', $user->id)->first();

    $this->gender = $personalDetails->sex;
    $this->phone = $personalDetails->phone;
    $this->marital_status = $personalDetails->marital_status;
    $this->occupation = $personalDetails->occupation;
    $this->telephone_number = $personalDetails->telephone_number;
    $this->email = $personalDetails->email;
    $this->occupation = $personalDetails->occupation;
    // Add more fields as needed...

    // Trigger Livewire to refresh the displayed data
    $this->emit('refreshLivewireComponent');
}



}
