


<div>
    @if (session()->has('success'))
            <div class="alert alert-success">
                {{ session('success') }}
            </div>
        @endif
        <form action="get"  wire:submit.prevent="register" enctype="multipart/form-data" >
            @csrf
            {{-- STEP 1 --}}

            @if ($currentStep == 1)

            <div class="step-one" id="1">
                <div class="card shadow_lg">
                <div class="card-header bg-primary "><h2>STEP1/5 - INSTRUCTIONS AND REQUIREMENTS</h2></div>
                    <div class="card-body">
                        <div class="row">
                        <div class="card">
                            <div class="card-header"><h3>Instructions</h3></div>
                            <div class="card-body">
                                <h5>1. Fill in the required details correctly</h5>
                                <h5>2. make sure to upload the correct documents</h5>
                            </div>
                        </div>
                        
                        </div>

                        <!-- <div class="mt-5">
                            <h3>The following are the requirements for ID application</h3>
                        </div> -->


                        <div class="row" style="margin-top:50px; text-size:;90px">
                           <section id="requirements" class="requirements">
                               
                                    <div class="card">
                                        <div class="card-header"><h3>Requirements for First time applicants</h3></div>
                                            <div class="card-body">
                                                <div class="row">
                                                <div class="col-md-6">
                                                    <div class="icon-box ">
                                                    
                                                    <h4><a href="#">Proof of Citizenship</a></h4>
                                                    <p>A scanned copy of applicants Kenyan Birth Certificate to be uploaded</p>
                                                    </div>
                                                </div>
                                                <div class="col-md-6 mt-4 mt-md-0">
                                                    <div class="icon-box ">
                                                
                                                    <h4><a href="#">Biometric data</a></h4>
                                                    <p>the applicant should provide 3 passport sized photos taken recently on a white background and avail themselves for fingerprint scanning at selected outlet</p>
                                                    </div>
                                                </div>
                                                <div class="col-md-6 mt-4 mt-md-0">
                                                    <div class="icon-box ">
                                                    
                                                    <h4><a href="#">Proof of Citizenship</a></h4>
                                                    <p>copy of Kenyan ID card for parents</p>
                                                    </div>
                                                </div>
                                                <div class="col-md-6 mt-4 mt-md-0">
                                                    <div class="icon-box ">
                                                
                                                    <h4><a href="#">Fee Payment</a></h4>
                                                    <p>A money order of CAD 70 payable to Kenya High Commissiom</p>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                            </section><!-- End  Section -->

                            <section id="requirements" class="requirements"  style="margin-top:50px;">
                                <div class="card">
                                    <div class="card-header"><h3>Requirements for Replacement/Lost/Mutilated/Duplicate ID cards applicants</h3></div>
                                    <div class="card-body">
                                        <div class="row">
                                            <div class="col-md-6">
                                                <div class="icon-box ">
                                                
                                                <h4><a href="#">Proof of Loss</a></h4>
                                                <p>A Police report or notarised affidavit explaining the circumstances of Loss</p>
                                                </div>
                                            </div>
                                            <div class="col-md-6">
                                                <div class="icon-box ">
                                                
                                                <h4><a href="#">Proof of Citizenship</a></h4>
                                                <p>A scanned copy of applicants Kenyan Birth Certificate to be uploaded</p>
                                                </div>
                                            </div>
                                            <div class="col-md-6 mt-4 mt-md-0">
                                                <div class="icon-box ">
                                            
                                                <h4><a href="#">Biometric data</a></h4>
                                                <p>the applicant should provide 2 passport sized photos taken recently on a white background and avail themselves for fingerprint scanning at selected outlet</p>
                                                </div>
                                            </div>
                                            <div class="col-md-6 mt-4 mt-md-0">
                                                <div class="icon-box ">
                                                
                                                <h4><a href="#">Proof of Citizenship</a></h4>
                                                <p>copy of Applicants lost/Mutilated/duplicate ID card to be uploaded </p>
                                                </div>
                                            </div>
                                            <div class="col-md-6 mt-4 mt-md-0">
                                                <div class="icon-box ">
                                            
                                                <h4><a href="#">Fee Payment</a></h4>
                                                <p>A money order of CAD 70 payable to Kenya High Commissiom</p>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </section><!-- End  Section -->

                            <section id="requirements" class="requirements"  style="margin-top:50px;">
                                <div class="card">
                                    <div class="card-header"><h3>Requirements for Change of Particulars Applicants</h3></div>
                                    <div class="card-body">
                                        <div class="row">
                                            <div class="col-md-6">
                                                <div class="icon-box ">
                                                
                                                <h4><a href="#">Proof of Citizenship</a></h4>
                                                <p>A scanned copy of applicants Kenyan Birth Certificate to be uploaded</p>
                                                </div>
                                            </div>
                                            <div class="col-md-6 mt-4 mt-md-0">
                                                <div class="icon-box ">
                                            
                                                <h4><a href="#">Biometric data</a></h4>
                                                <p>the applicant should provide 2 passport sized photos taken recently on a white background and avail themselves for fingerprint scanning at selected outlet</p>
                                                </div>
                                            </div>
                                            <div class="col-md-6 mt-4 mt-md-0">
                                                <div class="icon-box ">
                                                
                                                <h4><a href="#">Proof of Citizenship</a></h4>
                                                <p>copy of Applicants old ID card to be uploaded </p>
                                                </div>
                                            </div>
                                            <div class="col-md-6 mt-4 mt-md-0">
                                                <div class="icon-box ">
                                            
                                                <h4><a href="#">Fee Payment</a></h4>
                                                <p>A money order of CAD 70 payable to Kenya High Commissiom</p>
                                                </div>
                                            </div>
                                            <!-- <div class="col-md-6 mt-4 mt-md-0">
                                                <div class="icon-box ">
                                            
                                                <h4><a href="#">Copy of marriage certificate</a></h4>
                                                <p>For those who wants to take their spouses surname as a result of marriage</p>
                                                </div>
                                            </div>
                                            <div class="col-md-6 mt-4 mt-md-0">
                                                <div class="icon-box ">
                                            
                                                <h4><a href="#">Copy of husbands ID card</a></h4>
                                                <p>For those who wants to take their spouses surname as a result of marriage</p>
                                                </div>
                                            </div> -->
                                        </div>
                                    </div>
                                </div>
                            </section><!-- End  Section -->
                        </div>                           
                    </div>
                </div>
            </div>
            @endif


            {{-- STEP 2 --}}

            @if ($currentStep == 2)

            <div class="step-one" id="1">
                <div class="card shadow_lg">
                <div class="card-header bg-primary "><H2>STEP2/5 - PERSONAL DETAILS</H2></div>
                    <div class="card-body">
                        <div class="row">
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label for="">Full Names</label>
                                    <input type="text" class="form-control" placeholder="Enter full names" wire:model="full_names">
                                    <span class="text-danger">@error('full_names'){{ $message }}@enderror</span>
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label for="">Date of Birth</label>
                                    <input type="text" class="form-control" placeholder="Enter date of birth" wire:model="date_of_birth">
                                    <span class="text-danger">@error('date_of_birth'){{ $message }}@enderror</span>
                                </div>
                            </div>
                        
                        </div>
                        <div class="row">
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label for="">Gender</label>
                                    <select class="form-control" wire:model="gender">
                                        <option value="" selected>Choose Gender</option>
                                        <option value="male">Male</option>
                                        <option value="female">Female</option>
                                    </select>
                                    <span class="text-danger">@error('gender'){{ $message }}@enderror</span>
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label for="">Father's Name</label>
                                    <input type="text" class="form-control" placeholder="Enter father's name" wire:model="fathers_name">
                                    <span class="text-danger">@error('fathers_name'){{ $message }}@enderror</span>
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label for="">Mother's Name</label>
                                    <input type="text" class="form-control" placeholder="Enter mother's name" wire:model="mothers_name">
                                    <span class="text-danger">@error('mothers_name'){{ $message }}@enderror</span>
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label for="">Marital Status</label>
                                    <select class="form-control" wire:model="marital_status">
                                        <option value="" selected>Choose Marital status</option>
                                        <option value="single">Single</option>
                                        <option value="married">Married</option>
                                        <!-- <option value="male">Male</option> -->
                                    </select>
                                    <span class="text-danger">@error('marital_status'){{ $message }}@enderror</span>
                                </div>
                            </div>
                           
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label for="">Occupation</label>
                                    <input type="text" class="form-control" placeholder="enter your occupation" wire:model="occupation">
                                    <span class="text-danger">@error('occupation'){{ $message }}@enderror</span>
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label for="">Telphone Number</label>
                                    <input type="number" class="form-control" placeholder="enter your telephone number"wire:model="telephone_number">
                                    <span class="text-danger">@error('telephone_number'){{ $message }}@enderror</span>
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label for="">Email</label>
                                    <input type="email" class="form-control" placeholder="enter your email "wire:model="email">
                                    <span class="text-danger">@error('email'){{ $message }}@enderror</span>
                                </div>
                            </div>
                        </div>
                            
                    </div>
                </div>
            </div>
            @endif


            {{-- STEP 3 --}}

            @if ($currentStep == 3)

            <div class="step-two" id="2">
                <div class="card">
                    <div class="card-header bg-primary "><H2>Step3/5 - BIRTHPLACES AND LOCATIONS</H2></div>
                    <div class="card-body">
                        <div class="row">
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label for="">District of birth</label>
                                    <input type="text" class="form-control" placeholder="enter your district of birth" wire:model="district_of_birth">
                                    <span class="text-danger">@error('district_of_birth'){{ $message }}@enderror</span>
                                </div>
                            </div>
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label for="">Tribe</label>
                                        <select class="form-control" wire:model="tribe">
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
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label for="">Clan</label>
                                        <input type="text" class="form-control" placeholder="enter your clan" wire:model="clan">
                                        <span class="text-danger">@error('clan'){{ $message }}@enderror</span>
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label for="">Family</label>
                                        <input type="text" class="form-control" placeholder="enter your family" wire:model="family">
                                        <span class="text-danger">@error('family'){{ $message }}@enderror</span>
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label for="">Home District</label>
                                        <input type="text" class="form-control" placeholder="enter your home district" wire:model="home_district">
                                        <span class="text-danger">@error('home_district'){{ $message }}@enderror</span>
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label for="">Division</label>
                                        <input type="text" class="form-control" placeholder="enter your division" wire:model="division">
                                        <span class="text-danger">@error('division'){{ $message }}@enderror</span>
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label for="">Constituency</label>
                                        <input type="text" class="form-control" placeholder="enter your constituency" wire:model="constituency">
                                        <span class="text-danger">@error('constituency'){{ $message }}@enderror</span>
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label for="">Location</label>
                                        <input type="text" class="form-control" placeholder="enter your location" wire:model="location">
                                        <span class="text-danger">@error('location'){{ $message }}@enderror</span>
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label for="">Sub Location</label>
                                        <input type="text" class="form-control" placeholder="enter your sub location" wire:model="sub_location">
                                        <span class="text-danger">@error('sub_location'){{ $message }}@enderror</span>
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label for="">Village</label>
                                        <input type="text" class="form-control" placeholder="enter your village" wire:model="village">
                                        <span class="text-danger">@error('village'){{ $message }}@enderror</span>
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label for="">Home Address</label>
                                        <input type="text" class="form-control" placeholder="enter your home address" wire:model="home_address">
                                        <span class="text-danger">@error('home_address'){{ $message }}@enderror</span>
                                    </div>
                                </div>
                                
                        </div>
                        
                    </div>
            </div>
            @endif
            {{-- STEP 4 --}}

            @if ($currentStep == 4)

                    <div class="step-three" id="3">
                        <div class="card">
                            <div class="card-header bg-primary "><H2>STEP4/5 - DOCUMENTS IN SUPPORT OF APPLICATION. SELECT WHERE APPLICABLE</H2></div>
                            <div class="card-body">
                                <div class="frameworks d-flex flex-column align-items-left mt-2" >

                                        <div class="row">
                                                <div class="col-md-6">
                                                    <div class="form-group">
                                                        <label for="">Applicant’s Birth Certificate Number</label>
                                                        <input type="number" class="form-control" placeholder="enter your birth certificate number" wire:model="birth_certificate_number">
                                                        <span class="text-danger">@error('birth_certificate_number'){{ $message }}@enderror</span>
                                                    </div>
                                                </div>

                                                <div class="col-md-6">
                                                    <div class="form-group">
                                                        <label for="">Applicant’s Passport Number</label>
                                                        <input type="text" class="form-control" placeholder="enter your passport number" wire:model="passport_number">
                                                        <span class="text-danger">@error('passport_number'){{ $message }}@enderror</span>
                                                    </div>
                                                </div>

                                                <div class="col-md-6">
                                                    <div class="form-group">
                                                        <label for="">Parent’ Identity card Number</label>
                                                        <input type="text" class="form-control" placeholder="enter your parent's id number" wire:model="parents_id_number">
                                                        <span class="text-danger">@error('parents_id_number'){{ $message }}@enderror</span>
                                                    </div>
                                                </div>

                                                <div class="col-md-6">
                                                    <div class="form-group">
                                                        <label for="">Certificate of registration or naturalization Certificate Number</label>
                                                        <input type="text" class="form-control" placeholder="enter your certificate of registration number" wire:model="certificate_of_registration_number">
                                                        <span class="text-danger">@error('certificate_of_registration_number'){{ $message }}@enderror</span>
                                                    </div>
                                                </div>
                                        </div>

                                        
                                    
                            </div>
                        </div>
                    </div>
            @endif

                {{-- STEP 5 --}}
                @if ($currentStep == 5)
            
            <div class="step-four" id="5">
                <div class="card">
                    <div class="card-header bg-secondary ">STEP 5/5 - ATTACHMENTS</div>
                    <div class="card-body">
                        upload scanned images of the following
                        <div class="row">                                
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label for="birth-certificate">Birth Certificate</label>
                                        <input type="file" class="form-control" accept="image/*" wire:model="birth_certificate">
                                        <span class="text-danger">@error('birth_certificate'){{ $message }}@enderror</span>
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label for="passport_photo">Passport photo </label>
                                        <input type="file" class="form-control" accept="image/*" wire:model="passport_photo">
                                        <span class="text-danger">@error('passport_photo'){{ $message }}@enderror</span>
                                    </div>
                                </div>
                                
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label for="fathers_id_card_front">Father's ID card (front)</label>
                                        <input type="file" class="form-control" accept="image/*" wire:model="fathers_id_card_front">
                                        <span class="text-danger">@error('fathers_id_card_front'){{ $message }}@enderror</span>
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label for="fathers_id_card_back">Father's ID card (back)</label>
                                        <input type="file" class="form-control" accept="image/*" wire:model="fathers_id_card_back">
                                        <span class="text-danger">@error('fathers_id_card_back'){{ $message }}@enderror</span>
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label for="mothers_id_card_front">Mother's ID card (front)</label>
                                        <input type="file" class="form-control" accept="image/*" wire:model="mothers_id_card_front">
                                        <span class="text-danger">@error('mothers_id_card_front'){{ $message }}@enderror</span>
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label for="mothers_id_card_back">Mother's ID card (back)</label>
                                        <input type="file" class="form-control" accept="image/*" wire:model="mothers_id_card_back">
                                        <span class="text-danger">@error('mothers_id_card_back'){{ $message }}@enderror</span>
                                    </div>
                                </div>
                                
                            </div>

                            <div class="form-group">
                                <label for="terms" class="d-block">
                                <input type="checkbox" id="terms" wire:model="terms"> you must agree with our <a href="#">terms and conditions</a> 
                                </label>
                                <span class="text-danger">@error('terms'){{ $message }}@enderror</span>
                            </div>
                    </div>
                </div>
            </div>
            @endif

            <div class="action-buttons d-flex justify-content-between bg-white pt-3 pb-2 mb-5 shadow_lg">
            @if ($currentStep == 1)
                    @endif

                    @if ($currentStep == 2 || $currentStep == 3 || $currentStep == 4|| $currentStep == 5)
                        <button type="button" class="btn btn-md btn-secondary" wire:click="decreaseStep()">Back</button>
                    @endif
                    
                    @if ($currentStep == 1 || $currentStep == 2 || $currentStep == 3|| $currentStep == 4)
                        <button type="button" class="btn btn-md btn-success" wire:click="increaseStep()">Next</button>
                    @endif
                    
                    @if ($currentStep == 5)
                        <button type="submit" class="btn btn-md btn-primary">Submit</button>
                    @endif
            </div>



        </form>
    
</div>