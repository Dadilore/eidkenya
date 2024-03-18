<?php

namespace App\Livewire;

use Livewire\Component;
use Livewire\WithFileUploads;
use App\Models\Birthplaces;
use App\Models\PersonalDetails;
use App\Models\Documents;
use App\Models\Applications;
use App\http\Controllers\Auth\AuthenticatedSessionController;
use Illuminate\Support\Facades\Auth; // Import the Auth facade

class ChangeParticulars extends Component
{

    use WithFileUploads;

    public $user_id;
    public $full_names;
    public $date_of_birth;
    public $gender;
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
    public $old_id;
    public $application_status;
    public $terms;

    public $totalSteps = 6;
    public $currentStep = 1;

    public function mount()
    {
        $this->currentStep = 1;
        $this->user_id = Auth::user()->id;

    }

    public function render()
    {
        return view('livewire.change-particulars');
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
        if ($this->currentStep == 2) {
            $this->validate([
                'full_names' => 'required|string',
                'date_of_birth' => 'required|string',
                'gender' => 'required',
                'fathers_name' => 'required|string',
                'mothers_name' => 'required|string',
                'marital_status' => 'required',
                'occupation' => 'required|string',
                'telephone_number' => 'required',
                'email' => 'required|email',
            ]);
        } elseif ($this->currentStep == 3) {
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
        } elseif ($this->currentStep == 4) {
            $this->validate([
                'birth_certificate_number' => 'string',
                'passport_number' => 'string',
                'parents_id_number' => 'string',
                'certificate_of_registration_number' => 'string',
            ]);
        } elseif ($this->currentStep == 5) {
            $this->validate([
                'birth_certificate' => 'required|string',
                'fathers_id_card_front' => 'required|string',
                'fathers_id_card_back' => 'required',
                'mothers_id_card_front' => 'required|string',
                'mothers_id_card_back' => 'required|string',
            ]);
        }
    }

    public function register()
    {
        $this->resetErrorBag();

        if ($this->currentStep == 5) {

            // Insert into personal_details table
            PersonalDetails::create([
                'user_id' => $this->user_id,
                'full_names' => $this->full_names,
                'date_of_birth' => $this->date_of_birth,
                'gender' => $this->gender,
                'fathers_name' => $this->fathers_name,
                'mothers_name' => $this->mothers_name,
                'marital_status' => $this->marital_status,
                'husbands_names' => $this->husbands_names,
                'husbands_id_number' => $this->husbands_id_number,
                'occupation' => $this->occupation,
                'telephone_number' => $this->telephone_number,
                'email' => $this->email,
                // ... Other fields ...
            ]);

            // Insert into birthplaces table
            Birthplaces::create([
                'user_id' => $this->user_id,
                'district_of_birth' => $this->district_of_birth,
                'tribe' => $this->tribe,
                'clan' => $this->clan,
                'family' => $this->family,
                'home_district' => $this->clan,
                'division' => $this->division,
                'constituency' => $this->constituency,
                'location' => $this->location,
                'sub_location' => $this->sub_location,
                'village' => $this->village,
                'home_address' => $this->home_address,
                // ... Other fields ...
            ]);

             // Insert into applications table
            Applications::create([
                'user_id' => $this->user_id,
                // 'personal_details_id' => $personalDetails->id,
                // 'birthplaces_id' => $birthplaces->id,
                // 'documents_id' => $documents->id,
                // 'application_status' => $this->application_status,
                // ... Other fields ...
            ]);

            // Insert into documents table
            $document = Documents::create([
                'user_id' => $this->user_id,
                'birth_certificate_number' => $this->birth_certificate_number,
                'passport_number' => $this->passport_number,
                'parents_id_number' => $this->parents_id_number,
                'certificate_of_registration_number' => $this->certificate_of_registration_number,
                'birth_certificate' => $this->birth_certificate,
                'fathers_id_card_front' => $this->fathers_id_card_front,
                'fathers_id_card_back' => $this->fathers_id_card_back,
                'mothers_id_card_front' => $this->mothers_id_card_front,
                'mothers_id_card_back' => $this->mothers_id_card_back,
                'old_id' => $this->old_id,
                // ... Other fields ...
            ]);

            // Handle file uploads (e.g., passport photo, ID card photos)
            if ($this->currentStep === 5) {
                $this->currentDocumentId = $document->id;
                // Assuming you have stored the uploaded files in a folder named 'uploads'
                $birthCertificatePath = $this->birth_certificate->store('uploads', 'public');
                Documents::where('id', $this->currentDocumentId)->update(['birth_certificate' => $birthCertificatePath]);

                $passportPhotoPath = $this->passport_photo->store('uploads', 'public');               
                Documents::where('id', $this->currentDocumentId)->update(['passport_photo' => $passportPhotoPath]);
                     

                $fathersIdCardFrontPath = $this->fathers_id_card_front->store('uploads', 'public');                
                Documents::where('id', $this->currentDocumentId)->update(['fathers_id_card_front' => $fathersIdCardFrontPath]);

                $fathersIdCardBackPath = $this->fathers_id_card_back->store('uploads', 'public');               
                Documents::where('id', $this->currentDocumentId)->update(['fathers_id_card_back' => $fathersIdCardBackPath]);
                     

                $mothersIdCardFrontPath = $this->mothers_id_card_front->store('uploads', 'public');               
                Documents::where('id', $this->currentDocumentId)->update(['mothers_id_card_front' => $mothersIdCardFrontPath]);
                     
                $mothersIdCardBackPath = $this->mothers_id_card_back->store('uploads', 'public');
                Documents::where('id', $this->currentDocumentId)->update(['mothers_id_card_back' => $mothersIdCardBackPath]);

                $oldIdPath = $this->old_id->store('uploads', 'public');
                Documents::where('id', $this->currentDocumentId)->update(['old_id' => $oldIdPath]);

                // Repeat the same for other image fields (passport_photo, fathers_id_card_front, fathers_id_card_back, mothers_id_card_front, mothers_id_card_back)
                // Store their file paths in the documents table
                // ... (Similar logic for other images)
            }
            
        }

        

        
         session()->flash('success', 'Application submitted successfully. Proceed to payment.');
    }
}
