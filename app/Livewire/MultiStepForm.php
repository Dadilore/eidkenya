<?php

namespace App\Livewire;

use Livewire\Component;
use Livewire\WithFileUploads;
use App\Models\Birthplaces;
use App\Models\PersonalDetails;
use App\Models\Documents;
use App\Models\County;
use App\Models\SubCounty;
use App\Models\Applications;
use App\http\Controllers\Auth\AuthenticatedSessionController;
use Illuminate\Support\Facades\Auth;
use RealRashid\SweetAlert\Facades\Alert; 
use App\Http\Controllers\HomeController;

class MultiStepForm extends Component
{
    use WithFileUploads;

    public $user_id;
    public $name;
    public $middle_name;
    public $surname;
    public $sex;
    public $dob;
    public $phone;
    public $email;
    public $marital_status;
    public $occupation;
    public $nature_of_citizenship;
    public $birth_certificate_number;
    public $passport_number;
    public $registration_naturalization_number;
    public $spouses_name;
    public $spouses_id_number;
    public $fathers_name;
    public $fathers_id_number;
    public $mothers_name;
    public $mothers_id_number;
    public $county_of_birth;
    public $subcounty_of_birth;
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
    public $subcounties;

    public function mount()
    {
        $this->currentStep = 1;
        $this->user_id = Auth::user()->id;
        $this->counties = County::all(); 
        $this->loadAllSubcounties();
    }
    private function loadAllSubcounties() {
        $all_subcounties = SubCounty::orderBy('name')->get();

        $this->subcounties = $all_subcounties;
    }

    public function updatedSelectedCounty($value)
    {
        if ($value) {
            $filteredSubcounties = SubCounty::orderBy('name')->where('county_id', $value)->get();
            $this->subcounties = $filteredSubcounties;
        } else {
            $this->loadAllSubcounties();
        }
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

    public function register()
    {
        dd($this);
        $this->resetErrorBag();

        $personalDetails = null;
        $birthplaces = null;
        $document = null;
    

        if ($this->currentStep == 4) {

            $application = Applications::create([
                'user_id' => $this->user_id,
                'application_type' => 'New Application',
                'application_status' => 'incomplete', // Set initial application_status
            ]);
        
            // Check if the application was created successfully
            if ($application) {
                // Retrieve the ID of the created application
                $applicationsId = $application->id;
        
            // Insert into personal_details table
            $personalDetails = PersonalDetails::create([
                'user_id' => $this->user_id,
                'applications_id' => $applicationsId,
                'fathers_name' => $this->fathers_name,
                'mothers_name' => $this->mothers_name,
                'marital_status' => $this->marital_status,
                'occupation' => $this->occupation,
                // ... Other fields ...
            ]);

            // Insert into birthplaces table
            $birthplaces = Birthplaces::create([
                'user_id' => $this->user_id,
                'applications_id' => $applicationsId,
                'district_of_birth' => $this->district_of_birth,
                'tribe' => $this->tribe,
                'clan' => $this->clan,
                'family' => $this->family,
                'home_district' => $this->clan, // Note: Check if this is intended
                'division' => $this->division,
                'constituency' => $this->constituency,
                'location' => $this->location,
                'sub_location' => $this->sub_location,
                'village' => $this->village,
                'home_address' => $this->home_address,
                // ... Other fields ...
            ]);

            // Insert into documents table
            $document = Documents::create([
                'user_id' => $this->user_id,
                'applications_id' => $applicationsId,
                'birth_certificate_number' => $this->birth_certificate_number,
                'passport_number' => $this->passport_number,
                'parents_id_number' => $this->parents_id_number,
                'certificate_of_registration_number' => $this->certificate_of_registration_number,
                'birth_certificate' => $this->birth_certificate,
                'fathers_id_card_front' => $this->fathers_id_card_front,
                'fathers_id_card_back' => $this->fathers_id_card_back,
                'mothers_id_card_front' => $this->mothers_id_card_front,
                'mothers_id_card_back' => $this->mothers_id_card_back,
                // ... Other fields ...
            ]);

            $application->update(['application_status' => 'Application Complete']);


           // Send email after successful form submission
           $homeController = new HomeController();
           $homeController->sendnotification();

          

        

            // Handle file uploads (e.g., passport photo, ID card photos)
            if ($this->currentStep === 4) {
                // Check if birth_certificate file is present
                if ($this->birth_certificate) {
                    // Assuming you have stored the uploaded files in a folder named 'uploads'
                    $birthCertificatePath = $this->birth_certificate->store('uploads', 'public');
                    Documents::where('id', $document->id)->update(['birth_certificate' => $birthCertificatePath]);
                }
            
                // Repeat the same for other image fields (passport_photo, fathers_id_card_front, fathers_id_card_back, mothers_id_card_front, mothers_id_card_back)
                if ($this->passport_photo) {
                    $passportPhotoPath = $this->passport_photo->store('uploads', 'public');
                    Documents::where('id', $document->id)->update(['passport_photo' => $passportPhotoPath]);
                }
            
                if ($this->fathers_id_card_front) {
                    $fathersIdCardFrontPath = $this->fathers_id_card_front->store('uploads', 'public');
                    Documents::where('id', $document->id)->update(['fathers_id_card_front' => $fathersIdCardFrontPath]);
                }
            
                if ($this->fathers_id_card_back) {
                    $fathersIdCardBackPath = $this->fathers_id_card_back->store('uploads', 'public');
                    Documents::where('id', $document->id)->update(['fathers_id_card_back' => $fathersIdCardBackPath]);
                }
            
                if ($this->mothers_id_card_front) {
                    $mothersIdCardFrontPath = $this->mothers_id_card_front->store('uploads', 'public');
                    Documents::where('id', $document->id)->update(['mothers_id_card_front' => $mothersIdCardFrontPath]);
                }
            
                if ($this->mothers_id_card_back) {
                    $mothersIdCardBackPath = $this->mothers_id_card_back->store('uploads', 'public');
                    Documents::where('id', $document->id)->update(['mothers_id_card_back' => $mothersIdCardBackPath]);
                }
            
                // Store their file paths in the documents table
                // ... (Similar logic for other images)
            }
        }
            

            // ... (Your existing code below)
        }

        session()->flash('success', 'Application submitted successfully. click the button to proceed to payment.');
        
    }



    
}
