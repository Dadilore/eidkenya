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

class MultiStepForm extends Component
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
        $this->resetErrorBag();

        $personalDetails = null;
        $birthplaces = null;
        $document = null;

        // Check if the user has already applied for a new ID
        $existingApplication = Applications::where('user_id', auth()->id())
            ->where('application_type', 'New Application')
            ->first();

        if ($existingApplication) {
            // Redirect the user back with an error message
            return redirect()->back()->with('error', 'You have already applied for a new ID. You cannot apply for a second one.');
        }

        if ($this->currentStep == 4) {
            // Proceed with form submission since there is no existing application

            $application = Applications::create([
                'user_id' => $this->user_id,
                'application_type' => 'New Application',
                'application_status' => 'application_incomplete', 
            ]);

            // Check if the application was created successfully
            if ($application) {
                // Retrieve the ID of the created application
                $applicationsId = $application->id;

                $personalDetails = PersonalDetails::create([
                    'user_id' => $this->user_id,
                    'applications_id' => $applicationsId,
                    'fathers_name' => $this->fathers_name,
                    'mothers_name' => $this->mothers_name,
                    'marital_status' => $this->marital_status,
                    'occupation' => $this->occupation,
                    // ... Other fields ...
                ]);

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
                ]);

                
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
                ]);

                $application->update(['application_status' => 'Application Complete']);

                // Send email after successful form submission
                // $homeController = new HomeController();
                // $homeController->sendnotification();


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

                // Redirect to the payment page
                return redirect()->route('payment')->with('success', 'Application submitted successfully. Please enter your MPESA number or follow the paybill steps to complete your application payment.');
            }
        }

        // Return to the current step or display any other appropriate message
        // You can redirect to the first step of the form or stay on the current step
        return redirect()->back()->with('error', 'There was an error submitting your application. Please try again.');
    }



    
}
