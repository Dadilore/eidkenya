<?php

namespace App\Livewire;

use Livewire\Component;
use Livewire\WithFileUploads;
use App\Models\PersonalDetails;
use App\Models\Birthplace;
use App\Models\Document;
use Illuminate\Support\Facades\DB;

class MultiStepForm extends Component
{
    use WithFileUploads;

    public $full_names;
    public $date_of_birth;
    public $gender;
    public $fathers_name;
    public $mothers_name;
    public $marital_status;
    public $husbands_full_names;
    public $husbands_id_number;
    public $occupation;
    public $telephone_number;
    public $email;
    public $district_of_birth;
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
    public $terms;

    public $totalSteps = 4;
    public $currentStep = 1;

    public function mount()
    {
        $this->currentStep = 1;
    }

    public function render()
    {
        return view('livewire.multi-step-form');
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
        if ($this->currentStep == 1) {
            $this->validate([
                'full_names' => 'required|string',
                'date_of_birth' => 'required|string',
                'gender' => 'required',
                'fathers_name' => 'required|string',
                'mothers_name' => 'required|string',
                'marital_status' => 'required',
                'husbands_full_names' => 'required|string',
                'husbands_id_number' => 'required|string',
                'occupation' => 'required|string',
                'telephone_number' => 'required',
                'email' => 'required|email',
            ]);
        } elseif ($this->currentStep == 2) {
            $this->validate([
                'district_of_birth' => 'required|string',
                'clan' => 'required|string',
                'family' => 'required',
                'home_district' => 'required|string',
                'division' => 'required|string',
                'constituency' => 'required',
                'location' => 'required|string',
                'sub_location' => 'required|string',
                'village' => 'required|string',
                'home_address' => 'required',
            ]);
        } elseif ($this->currentStep == 3) {
            $this->validate([
                'birth_certificate_number' => 'required|string',
                'passport_number' => 'required|string',
                'parents_id_number' => 'required',
                'certificate_of_registration_number' => 'required|string',
            ]);
        }
    }

    public function register()
    {
        $this->resetErrorBag();
        $currentStep = $this->currentStep; // Declare $currentStep within the register method

        if ($currentStep == 4) {
            $this->validate([
                'birth_certificate' => 'required|image|mimes:jpeg,png,jpg|max:2048',
                'passport_photo' => 'required|image|mimes:jpeg,png,jpg|max:2048',
                'fathers_id_card_front' => 'required|image|mimes:jpeg,png,jpg|max:2048',
                'fathers_id_card_back' => 'required|image|mimes:jpeg,png,jpg|max:2048',
                'mothers_id_card_front' => 'required|image|mimes:jpeg,png,jpg|max:2048',
                'mothers_id_card_back' => 'required|image|mimes:jpeg,png,jpg|max:2048',
                'terms' => 'accepted',
            ]);

            // Upload files logic...

            // Clear input fields
            $this->reset([
                'birth_certificate', 'passport_photo', 'fathers_id_card_front',
                'fathers_id_card_back', 'mothers_id_card_front', 'mothers_id_card_back',
            ]);
        }

        // Begin a database transaction
        DB::beginTransaction();

        try {
            // Insert into personal_details table
            $personalDetails = PersonalDetails::create([
                'full_names' => $this->full_names,
                'date_of_birth' => $this->date_of_birth,
                'gender' => $this->gender,
                // Add other fields from the personal_details table
            ]);

            // Insert into birthplaces table
            $birthplace = Birthplace::create([
                'user_id' => $personalDetails->id,
                'district_of_birth' => $this->district_of_birth,
                'tribe' => $this->tribe,
                'clan' => $this->clan,
                'family' => $this->family,
                // Add other fields from the birthplaces table
            ]);

            // Insert into documents table
            $documents = Document::create([
                'user_id' => $personalDetails->id,
                'birth_certificate' => $birthCertificateName,
                'passport_photo' => $passportPhotoName,
                'fathers_id_card_front' => $fathersIdCardFrontName,
                'fathers_id_card_back' => $fathersIdCardBackName,
                'mothers_id_card_front' => $mothersIdCardFrontName,
                'mothers_id_card_back' => $mothersIdCardBackName,
                // Add other fields from the documents table
            ]);

            // Commit the transaction if all operations are successful
            DB::commit();

            $this->reset(); // Clear form fields
            $this->currentStep = 1;

            // Redirect or return a response
            return redirect()->route('registration.success', ['name' => $this->full_names, 'email' => $this->email]);
        } catch (\Exception $e) {
            // Something went wrong, rollback the transaction
            DB::rollBack();

            // Handle the exception (e.g., log the error or show a message)
            return back()->withError('Failed to register. Please try again.');
        }
    }
}
