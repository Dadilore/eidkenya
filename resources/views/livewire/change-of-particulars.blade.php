<div>
<div id="kt_app_content" class="app-content  flex-column-fluid ">
                
                <div id="kt_app_content_container" class="app-container mt-5 container-xxl ">
                   
                <div style="font-size: 24px; color: red;">Time spent: <span id="timer" style="font-weight: bold;"></span></div>
                
                    <div class="card my-5 mb-xxl-8 bg-light-primary">
                        <div class="card-body pt-9 pb-0">
                            <div class="d-flex flex-wrap flex-sm-nowrap">
                                <div class="flex-grow-1">
                                    <div class="d-flex justify-content-between align-items-start flex-wrap mb-2">
                                        <div class="d-flex flex-column">
                                            <div class="d-flex align-items-center mb-2">
                                                <span class="text-gray-900 text-hover-primary fs-2 fw-bold me-1">Application for New ID</span>
                                            </div>
                                            <div class="d-flex flex-wrap fw-semibold fs-6 mb-4 pe-2">
                                                <span class="d-flex align-items-center text-gray-500 text-hover-primary me-5 mb-2">
                                                    Application Fees: <span class="fw-bolder ms-1"> KES 1000</span></span>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    
                    <div class="card mb-5">
                        <div class="card-header">
                            <ul class="nav nav-stretch nav-line-tabs nav-line-tabs-2x border-transparent fs-5 fw-bold">
                                <li class="nav-item mt-2">
                                    <span class="nav-link d-flex flex-column align-items-start text-active-primary ms-0 me-10 py-5 @if ($currentStep == 1)active @endif">
                                        <span class="text-muted text-uppercase fw-light fs-6">Step 1/6</span> Instructions & Requirements</span>
                                </li>
                                <li class="nav-item mt-2">
                                    <span class="nav-link d-flex flex-column align-items-start text-active-primary ms-0 me-10 py-5 @if ($currentStep == 2)active @endif">
                                        <span class="text-muted text-uppercase fw-light fs-6">Step 2/6</span>Personal Information</span>
                                </li>
                                <li class="nav-item mt-2">
                                    <span class="nav-link d-flex flex-column align-items-start text-active-primary ms-0 me-10 py-5 @if ($currentStep == 3)active @endif">
                                        <span class="text-muted text-uppercase fw-light fs-6">Step 3/6</span>Birthplace and Locations</span>
                                </li>
                                <li class="nav-item mt-2">
                                    <span class="nav-link d-flex flex-column align-items-start text-active-primary ms-0 me-10 py-5 @if ($currentStep == 4)active @endif">
                                        <span class="text-muted text-uppercase fw-light fs-6">Step 4/6</span>Documents</span>
                                </li>
                            
                        </ul>
                        </div>
                        <div class="card-body">
                            <form action="get"  wire:submit.prevent="register3" enctype="multipart/form-data" >
                                @csrf
    
                                @if ($currentStep == 1)
                                <div id="1">
                                    <p class="text-primary fw-semibold fs-5 mt-1 mb-7">This application applies to a citizen applying for new identification documents. <br>The citizen must not have had an ID before.<br>
                                        The applicant must be of 18 years and above.<br/><br/>
                                    The applicant should ensure to follow the steps below</p>
                                    <div>
                                        <p class="fs-6 fw-semibold text-gray-600">
                                            1. <b>Duly fill and submit</b> the application form found <a href="{{ route('new_applications') }}">here.</a>
                                        </p>
                                        <div class="separator my-3"></div>
                                        <p class="fs-6 fw-semibold text-gray-600">
                                            2. Upload of <b>all required documents</b> including:-
                                            <ol type="a">
                                                <li>A copy of applicants Kenyan Birth Certificate.</li>
                                                <li>Copies of parents' Kenyan ID card.</li>
                                                <li>Recent passport-sized photo of applicant.</li>
                                            </ol>
                                        </p>
                                        <div class="separator my-3"></div>
                                        <p class="fs-6 fw-semibold text-gray-600">
                                            3. Pay the <b>KSH 1000</b> application fee to the Kenya High Commission.
                                        </p>
                                        <div class="separator my-3"></div>
                                        <p class="fs-6 fw-semibold text-gray-600">
                                            4. Select an appointment date for biometric capture.
                                        </p>
                                        <div class="separator my-3"></div>
                                        <p class="fs-6 fw-semibold text-gray-600">
                                            5. Select an appointment date for biometric capture at the selected location.
                                        </p>
                                        <div class="separator my-3"></div>
                                        <p class="fs-6 fw-semibold text-gray-600">
                                            6. Await notification to pick up the new identification document.
                                        </p>
                                        <div class="separator my-3"></div>
                                    </div>
                                </div>
                                @endif
    
                                @if ($currentStep == 2)
                                <div id="2">
                                    <div class="pb-4">
                                        <div class="separator border-2 my-3 w-25"></div>
                                    </div>
                                    <div class="row">
                                        <div class="col-md-4 mb-4">
                                            <div class="form-group">
                                                <label for="surname" class="d-flex align-items-center fs-5 fw-semibold mb-2 required">Surname </label>
                                                <input type="text" id="surname" class="form-control form-control-lg form-control-solid mb-3 mb-lg-0" value="{{ old ('surname') ?? Auth::user()->surname }}" wire:model="surname" disabled >
                                                <span class="text-danger">@error('surname'){{ $message }}@enderror</span>
                                            </div>
                                        </div>
                                        <div class="col-md-4 mb-4">
                                            <div class="form-group">
                                                <label for="name" class="d-flex align-items-center fs-5 fw-semibold mb-2 required">First Name</label>
                                                <input type="text" id="name" class="form-control form-control-lg form-control-solid mb-3 mb-lg-0" value="{{ old ('name') ?? Auth::user()->name }}" wire:model="name" disabled>
                                                <span class="text-danger">@error('name'){{ $message }}@enderror</span>
                                            </div>
                                        </div>
                                        <div class="col-md-4 mb-4">
                                            <div class="form-group">
                                                <label for="middle_name" class="d-flex align-items-center fs-5 fw-semibold mb-2 required">Other Names</label>
                                                <input type="text" id="middle_name" class="form-control form-control-lg form-control-solid mb-3 mb-lg-0" value="{{ old ('middle_name') ?? Auth::user()->middle_name }}" wire:model="middle_name" disabled>
                                                <span class="text-danger">@error('middle_name'){{ $message }}@enderror</span>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="row">
                                        <div class="col-md-6 mb-4">
                                            <div class="form-group">
                                                <label for="sex" class="d-flex align-items-center fs-5 fw-semibold mb-2 required">Gender</label>
                                                <select class="form-control form-control-lg form-control-solid mb-3 mb-lg-0" wire:model="sex" disabled>
                                                    <option value="">Choose Gender</option>
                                                    <option value="M" @if(Auth::user()->sex === "M") selected @endif>Male</option>
                                                    <option value="F" @if(Auth::user()->sex === "F") selected @endif>Female</option>
                                                </select>
                                                <span class="text-danger">@error('sex'){{ $message }}@enderror</span>
                                            </div>
                                        </div>
                                        <div class="col-md-6 mb-4">
                                            <div class="form-group">
                                                <label for="dob" class="d-flex align-items-center fs-5 fw-semibold mb-2 required">Date of Birth</label>
                                                <input type="text" class="form-control form-control-lg form-control-solid mb-3 mb-lg-0" value="{{ old ('dob') ?? Auth::user()->dob }}" wire:model="dob" disabled>
                                                <span class="text-danger">@error('dob'){{ $message }}@enderror</span>
                                            </div>
                                        </div>                        
                                    </div>
                                    <div class="row">
                                        <div class="col-md-6 mb-4">
                                            <div class="form-group">
                                                <label for="phone" class="d-flex align-items-center fs-5 fw-semibold mb-2 required">Telephone number</label>
                                                <input type="number" id="phone" class="form-control form-control-lg form-control-solid mb-3 mb-lg-0" value="{{ old ('phone') ?? Auth::user()->phone }}" wire:model="phone">
                                                <span class="text-danger">@error('phone'){{ $message }}@enderror</span>
                                            </div>
                                        </div>
                                        <div class="col-md-6 mb-4">
                                            <div class="form-group">
                                                <label for="email" class="d-flex align-items-center fs-5 fw-semibold mb-2 required">Email address</label>
                                                <input type="email" id="email" class="form-control form-control-lg form-control-solid mb-3 mb-lg-0" value="{{ old ('email') ?? Auth::user()->email }}" wire:model="email" disabled>
                                                <span class="text-danger">@error('email'){{ $message }}@enderror</span>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="row">
    
                                        <div class="col-md-6 mb-4">
                                            <div class="form-group">
                                                <label for="" class="d-flex align-items-center fs-5 fw-semibold mb-2 required">Marital Status</label>
                                                <select class="form-control form-control-lg form-control-solid mb-3 mb-lg-0" wire:model="marital_status" disabled>
                                                    <option value="" selected>Choose Marital status</option>
                                                    <option value="single">Single</option>
                                                    <option value="married">Married</option>
                                                    <option value="divorced">Divorced</option>
                                                    <option value="widowed">Widowed</option>
                                                </select>
                                                <span class="text-danger">@error('marital_status'){{ $message }}@enderror</span>
                                            </div>
                                        </div>
                                    
                                        <div class="col-md-6 mb-4">
                                            <div class="form-group">
                                                <label for="" class="d-flex align-items-center fs-5 fw-semibold mb-2 required">Occupation</label>
                                                <input type="text" class="form-control form-control-lg form-control-solid mb-3 mb-lg-0" placeholder="Where do you work?" wire:model="occupation">
                                                <span class="text-danger">@error('occupation'){{ $message }}@enderror</span>
                                            </div>
                                        </div>
                                    </div>
    
                                    <div class="py-4">
                                        <div class="separator border-2 my-3 w-25"></div>
                                    </div>
                                    <div class="row">
                                        <div class="col-md-6 mb-4">
                                            <div class="form-group">
                                                <label for="" class="d-flex align-items-center fs-5 fw-semibold mb-2 required">Father's Name</label>
                                                <input type="text" class="form-control form-control-lg form-control-solid mb-3 mb-lg-0" placeholder="Enter father's name" wire:model="fathers_name">
                                                <span class="text-danger">@error('fathers_name'){{ $message }}@enderror</span>
                                            </div>
                                        </div>
                                        <div class="col-md-6 mb-4">
                                            <div class="form-group">
                                                <label for="" class="d-flex align-items-center fs-5 fw-semibold mb-2 required">Mother's Name</label>
                                                <input type="text" class="form-control form-control-lg form-control-solid mb-3 mb-lg-0" placeholder="Enter mother's name" wire:model="mothers_name">
                                                <span class="text-danger">@error('mothers_name'){{ $message }}@enderror</span>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                @endif
    
                                @if ($currentStep == 3)
                                <div id="3">
                                    <div class="row">
                                        <div class="col-md-6 mb-4">
                                            <div class="form-group">
                                                <label for="" class="d-flex align-items-center fs-5 fw-semibold mb-2 required">County of birth</label>
                                                <select class="form-control form-control-lg form-control-solid mb-3 mb-lg-0"wire:model="county_of_birth">
                                                    @foreach($counties as $county)
                                                    <option value="{{ $county['code'] }}">{{ $county['name'] }}</option>
                                                    @endforeach
                                                </select>
                                                <span class="text-danger">@error('county_of_birth'){{ $message }}@enderror</span>
                                            </div>
                                        </div>
                                        <div class="col-md-6 mb-4">
                                            <div class="form-group">
                                                <label for="" class="d-flex align-items-center fs-5 fw-semibold mb-2 required">District of birth</label>
                                                <input type="text" class="form-control form-control-lg form-control-solid mb-3 mb-lg-0" placeholder="enter your district of birth" wire:model="district_of_birth">
                                                <span class="text-danger">@error('district_of_birth'){{ $message }}@enderror</span>
                                            </div>
                                        </div>
                                            <div class="col-md-6 mb-4">
                                                <div class="form-group">
                                                    <label for="" class="d-flex align-items-center fs-5 fw-semibold mb-2 required">Tribe</label>
                                                    <select class="form-control form-control-lg form-control-solid mb-3 mb-lg-0" wire:model="tribe">
                                                        <option value="" selected>Choose Tribe</option>
                                                        <option value="male">Luo</option>
                                                        <option value="female">Kikuyu</option>
                                                        <option value="female">Luhya</option>
                                                        <option value="female">Kissi</option>
                                                        <option value="female">Kalenjin</option>
                                                    </select>
                                                    <span class="text-danger">@error('tribe'){{ $message }}@enderror</span>
                                                </div>
                                            </div>
                                            <div class="col-md-6 mb-4">
                                                <div class="form-group">
                                                    <label for="" class="d-flex align-items-center fs-5 fw-semibold mb-2 required">Clan</label>
                                                    <input type="text" class="form-control form-control-lg form-control-solid mb-3 mb-lg-0" placeholder="enter your clan" wire:model="clan">
                                                    <span class="text-danger">@error('clan'){{ $message }}@enderror</span>
                                                </div>
                                            </div>
                                            <div class="col-md-6 mb-4">
                                                <div class="form-group">
                                                    <label for="" class="d-flex align-items-center fs-5 fw-semibold mb-2 required">Family</label>
                                                    <input type="text" class="form-control form-control-lg form-control-solid mb-3 mb-lg-0" placeholder="enter your family" wire:model="family">
                                                    <span class="text-danger">@error('family'){{ $message }}@enderror</span>
                                                </div>
                                            </div>
                                            <div class="col-md-6 mb-4">
                                                <div class="form-group">
                                                    <label for="" class="d-flex align-items-center fs-5 fw-semibold mb-2 required">Home District</label>
                                                    <input type="text" class="form-control form-control-lg form-control-solid mb-3 mb-lg-0" placeholder="enter your home district" wire:model="home_district">
                                                    <span class="text-danger">@error('home_district'){{ $message }}@enderror</span>
                                                </div>
                                            </div>
                                            <div class="col-md-6 mb-4">
                                                <div class="form-group">
                                                    <label for="" class="d-flex align-items-center fs-5 fw-semibold mb-2 required">Division</label>
                                                    <input type="text" class="form-control form-control-lg form-control-solid mb-3 mb-lg-0" placeholder="enter your division" wire:model="division">
                                                    <span class="text-danger">@error('division'){{ $message }}@enderror</span>
                                                </div>
                                            </div>
                                            <div class="col-md-6 mb-4">
                                                <div class="form-group">
                                                    <label for="" class="d-flex align-items-center fs-5 fw-semibold mb-2 required">Constituency</label>
                                                    <input type="text" class="form-control form-control-lg form-control-solid mb-3 mb-lg-0" placeholder="enter your constituency" wire:model="constituency">
                                                    <span class="text-danger">@error('constituency'){{ $message }}@enderror</span>
                                                </div>
                                            </div>
                                            <div class="col-md-6 mb-4">
                                                <div class="form-group">
                                                    <label for="" class="d-flex align-items-center fs-5 fw-semibold mb-2 required">Location</label>
                                                    <input type="text" class="form-control form-control-lg form-control-solid mb-3 mb-lg-0" placeholder="enter your location" wire:model="location">
                                                    <span class="text-danger">@error('location'){{ $message }}@enderror</span>
                                                </div>
                                            </div>
                                            <div class="col-md-6 mb-4">
                                                <div class="form-group">
                                                    <label for="" class="d-flex align-items-center fs-5 fw-semibold mb-2 required">Sub Location</label>
                                                    <input type="text" class="form-control form-control-lg form-control-solid mb-3 mb-lg-0" placeholder="enter your sub location" wire:model="sub_location">
                                                    <span class="text-danger">@error('sub_location'){{ $message }}@enderror</span>
                                                </div>
                                            </div>
                                            <div class="col-md-6 mb-4">
                                                <div class="form-group">
                                                    <label for="" class="d-flex align-items-center fs-5 fw-semibold mb-2 required">Village</label>
                                                    <input type="text" class="form-control form-control-lg form-control-solid mb-3 mb-lg-0" placeholder="enter your village" wire:model="village">
                                                    <span class="text-danger">@error('village'){{ $message }}@enderror</span>
                                                </div>
                                            </div>
                                            <div class="col-md-6 mb-4">
                                                <div class="form-group">
                                                    <label for="" class="d-flex align-items-center fs-5 fw-semibold mb-2 required">Home Address</label>
                                                    <input type="text" class="form-control form-control-lg form-control-solid mb-3 mb-lg-0" placeholder="enter your home address" wire:model="home_address">
                                                    <span class="text-danger">@error('home_address'){{ $message }}@enderror</span>
                                                </div>
                                            </div>
                                            
                                    </div>
                                </div>
                                @endif
    
                                {{-- STEP 4 --}}
    
                                @if ($currentStep == 4)
    
                                    <div class="step-three" id="4">
                                        <div class="card">
                                        
                                            <div class="card-body">
                                                <div class="frameworks d-flex flex-column align-items-left mt-2" >
    
                                                <div class="row">
                                                        <div class="col-md-6">
                                                            <div class="form-group">
                                                                <label for="">Applicant’s Birth Certificate Number</label>
                                                                <input type="number" class="form-control form-control-lg form-control-solid mb-3 mb-lg-0" placeholder="enter your birth certificate number" wire:model="birth_certificate_number">
                                                                <span class="text-danger">@error('birth_certificate_number'){{ $message }}@enderror</span>
                                                            </div>
                                                        </div>
    
                                                        <div class="col-md-6">
                                                            <div class="form-group">
                                                                <label for="">Applicant’s Passport Number</label>
                                                                <input type="text" class="form-control form-control-lg form-control-solid mb-3 mb-lg-0" placeholder="enter your passport number" wire:model="passport_number">
                                                                <span class="text-danger">@error('passport_number'){{ $message }}@enderror</span>
                                                            </div>
                                                        </div>
    
                                                        <div class="col-md-6" style="margin-top:40px;">
                                                            <div class="form-group">
                                                                <label for="">Any Parent’s Identity card Number</label>
                                                                <input type="text" class="form-control form-control-lg form-control-solid mb-3 mb-lg-0" placeholder="enter your parent's id number" wire:model="parents_id_number">
                                                                <span class="text-danger">@error('parents_id_number'){{ $message }}@enderror</span>
                                                            </div>
                                                        </div>
    
                                                        <div class="col-md-6 mt-5">
                                                            <div class="form-group">
                                                                <label for="">Certificate of registration or naturalization Certificate Number</label>
                                                                <input type="text" class="form-control form-control-lg form-control-solid mb-3 mb-lg-0" placeholder="enter your certificate of registration number" wire:model="certificate_of_registration_number">
                                                                <span class="text-danger">@error('certificate_of_registration_number'){{ $message }}@enderror</span>
                                                            </div>
                                                        </div>
                                                </div>
    
                                                        
                                                    
                                            </div>
                                        </div>
                                    </div>
    
                                    <div class="step-five" id="5">
                                    <div class="card">
                                        
                                        <div class="card-body">
                                            <h4>Upload scanned images of the following</h4>
                                            <div class="row"> 
                                                    <div class="col-md-6">
                                                        <div class="form-group">
                                                            <label for="police_report"> Police report or notarised affidavit </label>
                                                            <input type="file" class="form-control form-control-lg form-control-solid mb-3 mb-lg-0" accept="image/*" wire:model="police_report">
                                                            <span class="text-danger">@error('police_report'){{ $message }}@enderror</span>
                                                        </div>
                                                    </div>

                                                    <div class="col-md-6">
                                                        <div class="form-group">
                                                            <label for="old_id">Copy of old ID card</label>
                                                            <input type="file" class="form-control form-control-lg form-control-solid mb-3 mb-lg-0" accept="image/*" wire:model="old_id">
                                                            <span class="text-danger">@error('old_id'){{ $message }}@enderror</span>
                                                        </div>
                                                    </div>

                                                    <div class="col-md-6">
                                                        <div class="form-group">
                                                            <label for="birth-certificate">Birth Certificate</label>
                                                            <input type="file" class="form-control form-control-lg form-control-solid mb-3 mb-lg-0" accept="image/*" wire:model="birth_certificate">
                                                            <span class="text-danger">@error('birth_certificate'){{ $message }}@enderror</span>
                                                        </div>
                                                    </div>
                                                    <div class="col-md-6">
                                                        <div class="form-group">
                                                            <label for="passport_photo">Passport photo </label>
                                                            <input type="file" class="form-control form-control-lg form-control-solid mb-3 mb-lg-0" accept="image/*" wire:model="passport_photo">
                                                            <span class="text-danger">@error('passport_photo'){{ $message }}@enderror</span>
                                                        </div>
                                                    </div>
                                                    
                                                    <div class="col-md-6">
                                                        <div class="form-group">
                                                            <label for="fathers_id_card_front">Father's ID card (front)</label>
                                                            <input type="file" class="form-control form-control-lg form-control-solid mb-3 mb-lg-0" accept="image/*" wire:model="fathers_id_card_front">
                                                            <span class="text-danger">@error('fathers_id_card_front'){{ $message }}@enderror</span>
                                                        </div>
                                                    </div>
                                                    <div class="col-md-6">
                                                        <div class="form-group">
                                                            <label for="fathers_id_card_back">Father's ID card (back)</label>
                                                            <input type="file" class="form-control form-control-lg form-control-solid mb-3 mb-lg-0" accept="image/*" wire:model="fathers_id_card_back">
                                                            <span class="text-danger">@error('fathers_id_card_back'){{ $message }}@enderror</span>
                                                        </div>
                                                    </div>
                                                    <div class="col-md-6">
                                                        <div class="form-group">
                                                            <label for="mothers_id_card_front">Mother's ID card (front)</label>
                                                            <input type="file" class="form-control form-control-lg form-control-solid mb-3 mb-lg-0" accept="image/*" wire:model="mothers_id_card_front">
                                                            <span class="text-danger">@error('mothers_id_card_front'){{ $message }}@enderror</span>
                                                        </div>
                                                    </div>
                                                    <div class="col-md-6">
                                                        <div class="form-group">
                                                            <label for="mothers_id_card_back">Mother's ID card (back)</label>
                                                            <input type="file" class="form-control form-control-lg form-control-solid mb-3 mb-lg-0" accept="image/*" wire:model="mothers_id_card_back">
                                                            <span class="text-danger">@error('mothers_id_card_back'){{ $message }}@enderror</span>
                                                        </div>
                                                    </div>
                                                    
                                                </div>
                                        </div>
                                    </div>
                                </div>
                                @endif
    
    
                                <div class="d-flex flex-stack pt-10 justify-content-between">
                                    <div>
                                    @if ($currentStep == 2 || $currentStep == 3 || $currentStep == 4 )
                                        <button type="button" class="btn btn-md btn-secondary" wire:click="decreaseStep()">Back
                                            <i class="ki-outline ki-arrow-left fs-3 ms-1 me-0"></i>
                                        </button>
                                    @endif
                                    </div>
                                <div>
                                @if ($currentStep == 1 || $currentStep == 2 || $currentStep == 3 )
                                    <button type="button" class="btn btn-md btn-primary" wire:click="increaseStep()">
                                        Next
                                        <i class="ki-outline ki-arrow-right fs-3 ms-1 me-0"></i>
                                    </button>
                                @endif
                                
                                @if ($currentStep == 4)
                                    <button  type="submit" class="btn btn-md btn-primary">Submit</button>
                                @endif
    
                                
    
                                </div>
                                </div>
                            </form>
                            
                            
                        </div>
                    </div>
                    
                    <div class="card mt-5 ">
                                <!-- <div class="card-header"></div> -->
                                    <div class="card-body">
                                    @if (session()->has('success'))
                                        <div class="alert alert-success alert-dismissible fade show mt-5 " role="alert">
                                            {{ session('success') }}
                                            <a href="{{route('payment')}}"><button type="" class="btn btn-md btn-primary" >Proceed to Payment</button></a>
                                            <button type="button" class="btn-close btn btn-danger me-5 mt-5 btn btn-lg " data-bs-dismiss="alert" aria-label="Close"></button>
                                        </div>
                                    @endif 
                                    </div>
                                    @if(session('error'))
                                    <div class="alert alert-danger">
                                        {{ session('error') }}
                                        <button type="button" class="btn-close btn btn-danger btn-sm" data-bs-dismiss="alert" aria-label="Close"></button>
                                    </div>
                                    @endif
                            </div>
                    
            </div>
        </div>
</div>
