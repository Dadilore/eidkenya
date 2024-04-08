@extends('includes.main')
@section('pageTitle', 'Make Appointment')
@section('content')


    <div class="container">
        <div class="card my-5 mb-xxl-8 bg-light-primary">
            <div class="card-body pt-9 pb-0">
                <div class="d-flex flex-wrap flex-sm-nowrap">
                    <div class="flex-grow-1">
                        <div class="d-flex justify-content-between align-items-start flex-wrap mb-2">
                            <div class="d-flex flex-column">
                                <div class="d-flex align-items-center mb-2">
                                    <span class="text-gray-900 text-hover-primary fs-2 fw-bold me-1">Make Biometrics Capture Appointment</span>
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
    </div>
 
    @if (session()->has('success'))
        <div class="container mt-5 ">
        <div class="alert alert-success alert-dismissible fade show mt-5 " role="alert">
            {{ session('success') }}
            <button type="button" class="btn-close btn btn-danger me-5 mt-5" data-bs-dismiss="alert" aria-label="Close"></button>
        </div>
        </div>
    @endif

    
        @if(session('error'))
        <div class="container">
            <div class="alert alert-danger ms-5 me-5 ">
                {{ session('error') }}
                <button type="button" class="btn-close btn btn-danger btn-sm" data-bs-dismiss="alert" aria-label="Close"></button>
            </div>
        </div>
        @endif

        

    <div class="container">
        
    <a href="{{url('myappointment')}}"><button type="" class="btn btn-md btn-primary" > View Appointment </button></a>

    <form action="{{ route('make_biometrics_appointment', ['application_id' => $applications->id]) }}" method="POST" enctype="multipart/form-data">
        @csrf
        <!-- Hidden input field to carry the application ID -->
        <input type="hidden" name="application_id" value="{{ $applications->id }}">
                
            <div class="step-one" id="2">
                <div class="card shadow_lg">
                    <div class="card-header bg-secondary"><H2 class="mt-5"></H2></div>
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
    </div>

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
