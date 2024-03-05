@extends('includes.main')
@section('pageTitle', 'Payment')
@section('content')

<div id="kt_app_content" class="app-content  flex-column-fluid ">
        
    <div id="kt_app_content_container" class="app-container  container-xxl ">
		@include('dashboard.components.profile')
        @if (session()->has('success'))
            <div class="alert alert-success">
                {{ session('success') }}
            </div>
        @endif

    
        <div class="card my-5">
            <div class="card-header">
                <ul class="nav nav-stretch nav-line-tabs nav-line-tabs-2x border-transparent fs-5 fw-bold">
                    <li class="nav-item mt-2">
                    <span class="nav-link d-flex flex-column align-items-start text-active-primary ms-0 me-10 py-5">
                        <span class="text-muted text-uppercase fw-light fs-6">Step 1/6</span> Instructions & Requirements</span>
                </li>
                <li class="nav-item mt-2">
                    <span class="nav-link d-flex flex-column align-items-start text-active-primary ms-0 me-10 py-5">
                        <span class="text-muted text-uppercase fw-light fs-6">Step 2/6</span>Personal Information</span>
                </li>
                <li class="nav-item mt-2">
                    <span class="nav-link d-flex flex-column align-items-start text-active-primary ms-0 me-10 py-5">
                        <span class="text-muted text-uppercase fw-light fs-6">Step 3/6</span>Birthplace and Locations</span>
                </li>
                <li class="nav-item mt-2">
                    <span class="nav-link d-flex flex-column align-items-start text-active-primary ms-0 me-10 py-5">
                        <span class="text-muted text-uppercase fw-light fs-6">Step 4/6</span>Document Uploads</span>
                </li>
                    <li class="nav-item mt-2">
                        <span class="nav-link d-flex flex-column align-items-start text-active-primary ms-0 me-10 py-5 active">
                            <span class="text-muted text-uppercase fw-light fs-6">Step 6/6</span> Payment</span>
                    </li>
                  
            </ul>
            </div>
            <div class="card-body">
                    <div id="6">
                        <div class="row">
                            <div class="col-xl-4 mb-xl-10">
                                <form action="{{ route('mpesa.stkpush') }}" method="POST" enctype="multipart/form-data" >
                                    @csrf
                                    <div class="card h-md-100" dir="ltr"> 
                                        <div class="card-body d-flex flex-column flex-center"> 
                                            <div class="mb-2">
                                                <div class="text-center">
                                                    <div class="py-10 text-center">
                                                        <img src="{{ asset('assets/images/payment/mpesa_payment.webp') }}" class="theme-light-show w-200px" alt="">
                                                        <img src="{{ asset('assets/images/payment/mpesa_payment.webp') }}" class="theme-dark-show w-200px" alt="">
                                                    </div>
                                                <h1 class="fw-semibold text-gray-800 text-center lh-lg">           
                                                    <span class="fw-bolder text-primary">Pay Now</span>
                                                    Via STK Push
                                                </h1>
                                                <span class="text-gray-500 mt-1 fw-semibold fs-6 text-center">Enter your M-Pesa PIN when prompted on your phone. <b>KES 1000</b> will be deducted from your account.</span>
                                                </div>
                                            </div>
                                            <hr/>
                                            <div class="mb-1">
                                                <div class="row">
                                                    <label for="" class="required">M-Pesa Phone Number</label>
                                                    <div class="col-md-12">
                                                        <input type="number" class="form-control" name="number" placeholder="" required>
                                                    </div>
                                                    
                                                </div>
                                                <button class="btn btn-sm btn-primary mt-2" type="submit">
                                                    Pay Now</button>
                                            </div>
                                        </div>
                                    </div>
                                </form>
                            </div>
                            <div class="col-xl-8 mb-xl-10">

                                <div class="card" dir="ltr"> 
                                    <div class="card-body"> 
                                        <div class="mb-2">
                                            <div class="mb-4">
                                            <h1 class="fw-semibold text-gray-800 lh-lg">           
                                                <span class="fw-bolder">Pay</span>
                                                Via Lipa Na M-Pesa
                                            </h1>
                                            <span class="text-gray-500 mt-1 fw-semibold fs-6 text-center">Use the following steps to pay via PayBill. <b>KES 1000</b> will be deducted from your account.</span>
                                            </div>
                                            <div class="m-0">   
                                                <div class="d-flex flex-stack">
                                                    <div class="d-flex flex-stack flex-row-fluid d-grid gap-2">
                                                        <div class="me-5">
                                                            <span class="text-gray-800 fw-bold text-hover-primary fs-6">1. Go to M-Pesa menu on your phone</span>                                  
                                                        </div>
                                                    </div>                                
                                                </div>
                                                <div class="separator separator-dashed my-3"></div>
                                                <div class="d-flex flex-stack">
                                                    <div class="d-flex flex-stack flex-row-fluid d-grid gap-2">
                                                        <div class="me-5">
                                                            <span class="text-gray-800 fw-bold text-hover-primary fs-6">2. Select Lipa na M-Pesa</span>                                  
                                                        </div>
                                                    </div>                                
                                                </div>
                                                <div class="separator separator-dashed my-3"></div>
                                                <div class="d-flex flex-stack">
                                                    <div class="d-flex flex-stack flex-row-fluid d-grid gap-2">
                                                        <div class="me-5">
                                                            <span class="text-gray-800 fw-bold text-hover-primary fs-6">3. Select PayBill option</span>                                  
                                                        </div>
                                                    </div>                                
                                                </div>
                                                <div class="separator separator-dashed my-3"></div>
                                                <div class="d-flex flex-stack">
                                                    <div class="d-flex flex-stack flex-row-fluid d-grid gap-2">
                                                        <div class="me-5">
                                                            <span class="text-gray-800 fw-bold text-hover-primary fs-6">4. Enter Business Number <span class="fw-bolder text-primary">222222</span></span>                                  
                                                        </div>
                                                    </div>                                
                                                </div>
                                                <div class="separator separator-dashed my-3"></div>
                                                <div class="d-flex flex-stack">
                                                    <div class="d-flex flex-stack flex-row-fluid d-grid gap-2">
                                                        <div class="me-5">
                                                            <span class="text-gray-800 fw-bold text-hover-primary fs-6">5. Enter Account Number <span class="fw-bolder text-primary">gok</span></span>                                  
                                                        </div>
                                                    </div>                                
                                                </div>
                                                <div class="separator separator-dashed my-3"></div>
                                                <div class="d-flex flex-stack">
                                                    <div class="d-flex flex-stack flex-row-fluid d-grid gap-2">
                                                        <div class="me-5">
                                                            <span class="text-gray-800 fw-bold text-hover-primary fs-6">6. Enter the amount as <span class="fw-bolder text-primary">KES 1000</span></span>                                  
                                                        </div>
                                                    </div>                                
                                                </div>
                                                <div class="separator separator-dashed my-3"></div>
                                                <div class="d-flex flex-stack">
                                                    <div class="d-flex flex-stack flex-row-fluid d-grid gap-2">
                                                        <div class="me-5">
                                                            <span class="text-gray-800 fw-bold text-hover-primary fs-6">7. Enter your M-Pesa PIN</span>                                  
                                                        </div>
                                                    </div>                                
                                                </div>
                                                <div class="separator separator-dashed my-3"></div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    {{-- <div class="d-flex flex-stack pt-10 justify-content-between">
                        <div>
                        @if ($currentStep == 2 || $currentStep == 3 || $currentStep == 4 || $currentStep == 5 )
                            <button type="button" class="btn btn-md btn-secondary" wire:click="decreaseStep()">Back
                                <i class="ki-outline ki-arrow-left fs-3 ms-1 me-0"></i>
                            </button>
                        @endif
                        </div>
                    <div>
                    @if ($currentStep == 1 || $currentStep == 2 || $currentStep == 3 || $currentStep == 4)
                        <button type="button" class="btn btn-md btn-primary" wire:click="increaseStep()">
                            Next
                            <i class="ki-outline ki-arrow-right fs-3 ms-1 me-0"></i>
                        </button>
                    @endif
                    
                    @if ($currentStep == 5)
                        <button type="submit" class="btn btn-md btn-primary">Submit</button>
                    @endif
                    </div>
                    </div> --}}
            </div>
        </div>
    </div>
</div>
             
@endsection