@extends('includes.main')
@section('pageTitle', 'Reschedule Appointment')
@section('content')
 
<!-- @if (session()->has('success'))
            <div class="alert alert-success">
                {{ session('success') }}
                <a href="{{url('myappointment')}}"><button type="" class="btn btn-md btn-primary" > View Appointment </button></a>
            </div>
        @endif -->


    <form action="{{url('make_appointment')}}"  method="POST" enctype="multipart/form-data" >
            @csrf
            
        <div class="step-one" id="2">
            <div class="card shadow_lg">
                <div class="card-header bg-primary "><H2 class="mt-5">MAKE APPOINTMENT </H2></div>
                    <div class="card-body">
                        <div class="row">

                            <div class="col-md-6">
                                <div class="form-group">
                                    <label for="">Date of Appointment</label>
                                    <input type="date" class="form-control" name="appointment_date" required >
                                </div>
                            </div>

                            <div class="col-md-6">
                                <div class="form-group">
                                    <label for="">Time of Appointment</label>
                                    <input type="time" class="form-control" name="appointment_time" required>
                                </div>
                            </div>

                            <div class="col-md-6">
                            <div class="form-group">
                                <label for="">Venue</label>
                                <select class="form-control" name="appointment_venue" required>
                                    <option value="" selected>Choose Venue</option>
                                    <option value="Nairobi Huduma Centre">Nairobi Huduma Centre</option>
                                    <option value="Kisumu Huduma Centre">Kisumu Huduma Centre</option>
                                    <option value="Mombasa Huduma centre">Mombasa Huduma Centre</option>
                                </select>
                            </div>
                        </div>

                        </div> 
                    </div>
                    
            </div>
            <button type="submit" class="btn btn-md btn-primary mt-5 me-5" style="float: right;">Make Appointment</button>
        </div>

            

    </form>

@endsection
