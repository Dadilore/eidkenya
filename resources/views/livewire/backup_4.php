<?php

namespace App\Livewire;

use Livewire\Component;
use Livewire\WithFileUploads;
use App\Models\Student;

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


    public function mount(){
        $this->currentStep = 1;
    }
    public function render()
    {
        return view('livewire.multi-step-form');
    }
    public function increaseStep(){
        $this->resetErrorBag();
        $this->validateData();
         $this->currentStep++;
         if($this->currentStep > $this->totalSteps){
             $this->currentStep = $this->totalSteps;
         }
    }

    public function decreaseStep(){
        $this->resetErrorBag();
        $this->currentStep--;
        if($this->currentStep < 1){
            $this->currentStep = 1;
        }
    }

    public function validateData(){

        if($this->currentStep == 1){
            $this->validate([
                'full_names'=>'required|string',
                'date_of_birth'=>'required|string',
                'gender'=>'required',
                'fathers_name'=>'required|string',
                'mothers_name'=>'required|string',
                'marital_status'=>'required',
                'husbands_full_names'=>'required|string',
                'husbands_id_number'=>'required|string',
                'occupation'=>'required|string',
                'telephone_number'=>'required',
                'email'=>'required|email'
            ]);
        }
        elseif($this->currentStep == 2){
              $this->validate([
                'district_of_birth'=>'required|string',
                'clan'=>'required|string',
                'family'=>'required',
                'home_district'=>'required|string',
                'division'=>'required|string',
                'constituency'=>'required',
                'location'=>'required|string',
                'sub_location'=>'required|string',
                'village'=>'required|string',
                'home_address'=>'required'
              ]);
        }
        elseif($this->currentStep == 3){
              $this->validate([
                'birth_certificate_number'=>'required|string',
                'passport_number'=>'required|string',
                'parents_id_number'=>'required',
                'certificate_of_registration_number'=>'required|string'
              ]);
        }
    }

    public function register(){
        $this->resetErrorBag();
        if($this->currentStep == 4){
            $this->validate([
                'birth_certificate'=>'required|string',
                'passport_photo'=>'required|string',
                'fathers_id_card_front'=>'required',
                'fathers_id_card_back'=>'required',
                'mothers_id_card_front'=>'required',
                'mothers_id_card_back'=>'required',
                'terms'=>'accepted'
            ]);
        }

        $cv_name = 'CV_'.$this->cv->getClientOriginalName();
        $upload_cv = $this->cv->storeAs('students_cvs', $cv_name);

        // if($upload_cv){
        //     $values = array(
        //         "first_name"=>$this->first_name,
        //         "last_name"=>$this->last_name,
        //         "gender"=>$this->gender,
        //         "email"=>$this->email,
        //         "phone"=>$this->phone,
        //         "country"=>$this->country,
        //         "city"=>$this->city,
        //         "frameworks"=>json_encode($this->frameworks),
        //         "description"=>$this->description,
        //         "cv"=>$cv_name,
        //     );

        //     Student::insert($values);
        //     $this->reset();
        //     $this->currentStep = 1;
        //   $data = ['name'=>$this->first_name.' '.$this->last_name,'email'=>$this->email];
        //   return redirect()->route('registration.success', $data);
        // }
  }
}
