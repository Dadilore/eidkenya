@extends('includes.main')
@section('pageTitle', 'Make Appointment')
@section('content')
 
@if (session()->has('success'))
            <div class="container mt-5 ">
            <div class="alert alert-success alert-dismissible fade show mt-5 " role="alert">
                {{ session('success') }}
                <a href="{{url('myappointment')}}"><button type="" class="btn btn-md btn-primary" > View Appointment </button></a>
                <button type="button" class="btn-close btn btn-danger me-5 mt-5" data-bs-dismiss="alert" aria-label="Close"></button>
            </div>
            </div>
        @endif

        


    <form action="{{url('make_appointment')}}"  method="POST" enctype="multipart/form-data" >
            @csrf
            
        <div class="step-one" id="2">
            <div class="card shadow_lg">
                <div class="card-header bg-primary "><H2 class="mt-5">MAKE BIOMETRICS CAPTURE APPOINTMENT </H2></div>
                    <div class="card-body">
                        <div class="row">

                        <div class="col-md-6">
                            <div class="form-group">
                                <label for="">Date of Appointment</label>
                                <input type="date" class="form-control" name="appointment_date" required 
                                    min="{{ now()->toDateString() }}" 
                                    oninput="setMinDate(this)">
                            </div>
                        </div>


                        <div class="col-md-6">
                            <div class="form-group">
                                <label for="">Time of Appointment</label>
                                <select class="form-control" name="appointment_time" required>
                                    <option value="" selected>Choose time to make your appointment</option>
                                    <option style="color:#000;" value="9:00 AM">9:00 AM</option>
                                    <option style="color:#000;" value="11:00 AM">11:00 AM</option>
                                    <option style="color:#000;" value="2:00 PM">2:00 PM</option>
                                </select>
                            </div>
                            </div>


                            <div class="col-md-6">
                            <div class="form-group">
                                <label for="">Venue</label>
                                <select class="form-control" name="appointment_venue" required>
                                    <option value="" selected>Where do you want your biometrics to be captured</option>
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

    <script>
    function setMinDate(input) {
        const selectedDate = new Date(input.value);
        const dayOfWeek = selectedDate.getDay(); // 0 (Sunday) to 6 (Saturday)

        // Disable weekends (Saturday and Sunday)
        if (dayOfWeek === 0 || dayOfWeek === 6) {
            input.setCustomValidity('Weekend dates are not allowed.');
        } else {
            input.setCustomValidity('');

            // Disable past dates
            const currentDate = new Date();
            currentDate.setHours(0, 0, 0, 0); // Set current time to midnight
            if (selectedDate < currentDate) {
                input.setCustomValidity('Past dates are not allowed.');
            } else {
                input.setCustomValidity('');
            }
        }
    }
</script>






@endsection
