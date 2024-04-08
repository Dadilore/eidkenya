@extends('includes.main')
@section('pageTitle', 'My Application')
@section('content')

<div class="container-fluid page-body-wrapper ">
   
    <div class="card my-5 mb-xxl-8 bg-light-primary">
        <div class="card-body pt-9 pb-0">
            <div class="d-flex flex-wrap flex-sm-nowrap">
                <div class="flex-grow-1">
                    <div class="d-flex justify-content-between align-items-start flex-wrap mb-2">
                        <div class="d-flex flex-column">
                            <div class="d-flex align-items-center mb-2">
                                <span class="text-gray-900 text-hover-primary fs-2 fw-bold me-1">My Application </span>
                            </div>
                            <div class="d-flex flex-wrap fw-semibold fs-6 mb-4 pe-2">
                                
                            </div>
                            <h3>Instructions</h3>
                            <h6>1. Ensure to download the receipt prior to visiting any Huduma Centre as it will be necessary.</h6><br>

                            <h6> 2. Click on appointments to schedule a biometrics capture appointment if you haven't already booked one.</h6> <br>
                            
                            <h6>
                            3. If your ID is ready for pickup and you've received a notification from eIDKenya, please schedule a pickup appointment by clicking on "appointments".
                            </h6>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        
    </div>
    
        
    


    <div  align="center" style="padding: 100px;  margin-right: 60px; " class="text-center mx-auto shadow" style="max-width: 800px;">

        @if (session()->has('success'))
            <div class="container mt-5">
                <div class="alert alert-success alert-dismissible fade show mt-5" role="alert">
                    {{ session('success') }}
                    <button type="button" class="btn-close btn btn-danger me-5 mt-2" data-bs-dismiss="alert" aria-label="Close"></button>
                </div>
            </div>
        @endif

       
        <div class="card-body pt-6 ">
        <div class="table-responsive " >
            <table class="table table-row-dashed align-middle gs-0 gy-3 my-0">
                <thead>
                    <tr class="fs-7 fw-bold text-gray-500 border-bottom-0">
                        <th class="p-0 pb-3 min-w-175px text-start">APPLICATION</th>
                        <th class="p-0 pb-3 min-w-100px text-end">CREATED ON</th>
                        <th class="p-0 pb-3 min-w-100px text-end pe-12">STATUS</th>
                        <th class="p-0 pb-3 min-w-150px text-end">APPOINTMENTS</th>
                        <th class="p-0 pb-3 min-w-150px text-end">RECEIPT</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach($applications as $application)
                        <tr>
                            <td>
                                <div class="d-flex align-items-center">
                                    <div class="d-flex justify-content-start flex-column">
                                        <a href="#" class="text-gray-800 fw-bold text-hover-primary mb-1 fs-6">{{ $application->application_type }}</a>
                                        <span class="text-gray-500 fw-semibold d-block fs-7">{{ $application->id }}</span>
                                    </div>
                                </div>
                            </td>
                            <td class="text-end pe-0">
                                <span class="text-gray-600 fw-bold fs-6">{{ $application->created_at }}</span>
                            </td>
                            <td class="text-end pe-12">
                                <span class="badge py-3 px-4 fs-7 badge-light-{{ $application->application_status == 'Approved'? 'success' : 'danger' }}">{{ $application->application_status }}</span>
                            </td>
                            <td class="text-end">
                                <div class="btn-group">
                                    <button type="button" class="btn btn-primary btn-sm dropdown-toggle" data-bs-toggle="dropdown" aria-expanded="false">
                                        Appointments
                                    </button>
                                    <ul class="dropdown-menu mt-1">
                                        <li><a class="dropdown-item" href="{{ route('biometrics_form', ['application_id' => $application->id]) }}"> Make Biometrics Capture Appointment</a></li>

                                        <li>
                                        <a class="dropdown-item" href="{{ route('pickup_form', ['application_id' => $application->id]) }}">Make ID pickup Appointment</a>
                                        </li>

                                    </ul>
                                </div>
                            </td>
                            <td class="text-end pe-0">
                                <a href="{{ route('generate_invoice_pdf', ['application_id' => $application->id]) }}" class="btn btn-primary btn-sm">Download Receipt</a>
                            </td>

                        </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
</div>

       
    </div>
</div>

@endsection
