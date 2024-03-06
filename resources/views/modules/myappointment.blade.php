@extends('includes.main')
@section('pageTitle', 'My Appointment')
@section('content')



<div class="card">
    <div class="card-header bg-primary "><h2 class="mt-5">MY BIOMETRICS CAPTURE APPOINTMENT </h2></div>
    <div class="card-body">

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
            <div align="center" style="padding: 70px;" class="mx-auto" style="max-width: 800px;">
            @if (session()->has('success'))
                <div class="container mt-5">
                    <div class="alert alert-success alert-dismissible fade show mt-5" role="alert">
                        {{ session('success') }}
                        <button type="button" class="btn-close btn btn-danger me-5 mt-2" data-bs-dismiss="alert" aria-label="Close"></button>
                    </div>
                </div>
            @endif
                <table class="table table-bordered" style="border: 1px solid green;">
                    <tr style="background-color:#17C653; border: 1px solid green;">
                        <th style="padding: 10px; font-size: 20px; border: 1px solid green; ">Appointment Date</th>
                        <th style="padding: 10px; font-size: 20px; border: 1px solid green; ">Appointment Time</th>
                        <th style="padding: 10px; font-size: 20px; border: 1px solid green; ">Appointment Venue</th>
                        <th style="padding: 10px; font-size: 20px; border: 1px solid green; ">Status</th>
                        <th style="padding: 10px; font-size: 20px; border: 1px solid green; ">Action</th>
                    </tr>

                    @foreach($appoint as $appoints)
                        <tr style="border: 1px solid green; align: center;">
                            <td style="border: 1px solid green;">{{$appoints->appointment_date}}</td>
                            <td style="border: 1px solid green;">{{$appoints->appointment_time}}</td>
                            <td style="border: 1px solid green;">{{$appoints->appointment_venue}}</td>  
                            <td style="border: 1px solid green;">{{$appoints->status}}</td> 
                            <td style="justify-content: space-between;">
                                <a class="btn btn-danger md" onclick="return confirm('Are you sure you want to cancel this Appointment ?')" href="{{url('cancel_appoint',$appoints->id)}}">Cancel</a>
                                <a class="btn btn-primary md"  href="#">Reschedule</a><br>
                            </td>
                        </tr>
                    @endforeach
                </table>
            </div>
        @endif
    </div>
</div>

@endsection
