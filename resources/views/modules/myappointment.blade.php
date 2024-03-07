@extends('includes.main')
@section('pageTitle', 'My Appointment')
@section('content')

<div class="container-fluid page-body-wrapper ">
    <div align="center" style="padding: 70px;" class="mx-auto shadow " style="max-width: 800px;">
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
                <thead class="thead-dark">
                    <tr>
                        <th>Appointment Date</th>
                        <th>Appointment Time</th>
                        <th>Appointment Venue</th>
                        <th>Status</th>
                        <th>Action</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach($appoint as $appoints)
                        <tr>
                            <td>{{$appoints->appointment_date}}</td>
                            <td>{{$appoints->appointment_time}}</td>
                            <td>{{$appoints->appointment_venue}}</td>  
                            <td>{{$appoints->status}}</td> 
                            <td>
                                <a class="btn btn-danger md" onclick="return confirm('Are you sure you want to cancel this Appointment ?')" href="{{url('cancel_appoint',$appoints->id)}}">Cancel</a>
                                <a class="btn btn-primary md"  href="#">Reschedule</a><br>
                            </td>
                        </tr>
                    @endforeach
                </tbody>
            </table>
        @endif
    </div>
</div>

@endsection
