@extends('includes.main')
@section('pageTitle', 'My Appointment')
@section('content')

<div class="container-fluid page-body-wrapper">
    <div align="center" style="padding: 70px;" class="mx-auto shadow" style="max-width: 800px;">
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
                <thead class="thead-dark" style="background-color:#17C653;">
                    <tr>
                        <th>Appointment Date</th>
                        <th>Appointment Time</th>
                        <th>Appointment Venue</th>
                        <th>Status</th>
                        <th>Actions</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach($appoint as $appoints)
                        <tr>
                            <td>{{$appoints->appointment_date}}</td>
                            <td>{{$appoints->appointment_time}}</td>
                            <td>{{$appoints->appointment_venue}}</td>  
                            <td style="color: #8B0000;">{{$appoints->status}}</td> <!-- Add color style for the Status column -->
                            <td>
                                <div class="btn-group">
                                    <button type="button" class="btn btn-primary dropdown-toggle" data-bs-toggle="dropdown" aria-expanded="false">
                                        Actions
                                    </button>
                                    <ul class="dropdown-menu mt-1">
                                        <li><a class="dropdown-item" onclick="return confirm('Are you sure you want to cancel this Appointment ?')" href="{{url('cancel_appoint',$appoints->id)}}">Cancel</a></li>
                                        <li><a class="dropdown-item" href="#">Reschedule</a></li>
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
