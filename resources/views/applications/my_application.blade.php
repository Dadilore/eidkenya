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

        @if(count($data) > 0)
        <table class="table table-bordered "  style="margin-right: 20px; width: 80%;">

            <tr class="bg-secondary">
                <th>Application ID</th>
                <th>Application type</th>
                <th> Status</th>
                <!-- <th>Actions</th> -->
                <th>Appointments</th>
                <th>Receipt</th>
            </tr>

            @foreach($data as $applications)
                <tr align="center">
                    <td>{{$applications->id}}</td>
                    <td>{{$applications->application_type}}</td>         
                    <td style="color: #000;" ><p>{{$applications->application_status}}</p></td>
                    <!-- <td>
                        <div class="btn-group">
                            <button type="button" class="btn btn-primary dropdown-toggle" data-bs-toggle="dropdown" aria-expanded="false">
                                Actions
                            </button>
                            <ul class="dropdown-menu mt-1">
                                <li><a class="dropdown-item" href="{{url('deleteapplication',$applications->id)}}" onclick="return confirm('Are you sure you want to delete this application')">Delete</a></li>
                                <li><a class="dropdown-item" href="{{url('update_application',$applications->id)}}">Update</a></li>
                            </ul>
                        </div>
                    </td> -->

                    <td>
                        <div class="btn-group">
                            <button type="button" class="btn btn-primary dropdown-toggle" data-bs-toggle="dropdown" aria-expanded="false">
                                Appointments
                            </button>
                            <ul class="dropdown-menu mt-1">
                                <li><a class="dropdown-item" href="{{url('make_appointment')}}"> Make Biometrics Capture Appointment</a></li>
                                <li><a class="dropdown-item" href="{{url('pickup_appointment')}}">Make ID pickup Appointment</a></li>
                            </ul>
                        </div>
                    </td>
                    <td>
                        <a href="{{ url('generate_invoice_pdf') }}" class="btn btn-primary">Download Receipt</a>
                        
                    </td>
                    <!-- <td><a href="#" class="btn btn-primary">View Receipt</a></td> -->
                </tr>
            @endforeach
        </table>

        @else
        <div class="card shadow">
            <div class="card-header"></div>
            <div class="card-body">
                <h1 align="center" class="alert alert-danger mt-3 ">YOU HAVE NO APPLICATION</h1>
                <h5 class="alert alert-info mt-3 ">Go to the dashboard, select your application type and apply for an ID </h5>
            </div>
        </div>
        @endif
    </div>
</div>

@endsection
