@extends('includes.main')
@section('pageTitle', 'My Appointment')
@section('content')

<div class="container-fluid page-body-wrapper">

        <div class="card my-5 mb-xxl-8 bg-light-primary">
            <div class="card-body pt-9 pb-0">
                <div class="d-flex flex-wrap flex-sm-nowrap">
                    <div class="flex-grow-1">
                        <div class="d-flex justify-content-between align-items-start flex-wrap mb-2">
                            <div class="d-flex flex-column">
                                <div class="d-flex align-items-center mb-2">
                                    <span class="text-gray-900 text-hover-primary fs-2 fw-bold me-1">My Appointment </span>
                                </div>
                                <div class="d-flex flex-wrap fw-semibold fs-6 mb-4 pe-2">
                                    <span class="d-flex align-items-center text-gray-500 text-hover-primary me-5 mb-2">
                                          <span class="fw-bolder ms-1"></span></span>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>

    <div align="center" style="padding: 100px;  margin-right: 60px; " class="text-center mx-auto shadow" style="max-width: 800px;">

         

        @if (session()->has('success'))
            <div class="container mt-5">
                <div class="alert alert-success alert-dismissible fade show mt-5" role="alert">
                    {{ session('success') }}
                    <button type="button" class="btn-close btn btn-danger me-5 mt-2" data-bs-dismiss="alert" aria-label="Close"></button>
                </div>
            </div>
        @endif
        
        @if($appoint->isEmpty())
            <div class="container">
                <div class="card shadow">
                    <div class="card-header"></div>
                    <div class="card-body">
                        <h1 align="center" class="alert alert-danger mt-3">YOU HAVE NO APPOINTMENT</h1>
                    </div>
                </div>
            </div>
        @else
            <table class="table table-bordered">
                
                    <tr class="bg-secondary">
                        <th>Appointment Date</th>
                        <th>Appointment Time</th>
                        <th>Appointment Venue</th>
                        <th>Status</th>
                        <th>Actions</th>
                    </tr>
                
                <tbody>
                    @foreach($appoint as $appoints)
                        <tr align="center">
                            <td>{{$appoints->appointment_date}}</td>
                            <td>{{$appoints->appointment_time}}</td>
                            <td>{{$appoints->appointment_venue}}</td>  
                            <td style="color: #000;"><p  style="background-color:#FF6961; border-radius:10px; me-0">{{$appoints->status}}</p></td> 
                            <td>
                                <div class="btn-group">
                                    <button type="button" class="btn btn-primary dropdown-toggle" data-bs-toggle="dropdown" aria-expanded="false">
                                        Actions
                                    </button>
                                    <ul class="dropdown-menu mt-1">
                                        <li><a class="dropdown-item" onclick="return confirm('Are you sure you want to cancel this Appointment ?')" href="{{url('cancel_appoint',$appoints->id)}}">Cancel</a></li>
                                        <li><a class="dropdown-item" href="{{ url('reschedule_appointment',$appoints->id) }}">Reschedule</a></li>
                                    </ul>
                                </div>
                            </td>
                        </tr>
                    @endforeach
                </tbody>
            </table>
        @endif
    </div>
</div>

@endsection
