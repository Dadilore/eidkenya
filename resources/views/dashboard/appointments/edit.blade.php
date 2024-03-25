@extends('includes.main')
@section('pageTitle', 'Reschedule Appointment')
@section('content')


@if (session()->has('success'))
        <div class="container mt-5">
            <div class="alert alert-success alert-dismissible fade show mt-5" role="alert">
                {{ session('success') }}
                <button type="button" class="btn-close btn btn-danger me-5 mt-2" data-bs-dismiss="alert" aria-label="Close"></button>
            </div>
        </div>
    @endif

    <div class="container">
        <form action="{{ route('appointments.update', ['appointment' => $data->id]) }}"  method="POST" enctype="multipart/form-data" > 
                @csrf
                @method('PUT')
            <div class="step-one" id="2">
                <div class="card shadow_lg">
                    <div class="card-header bg-secondary"><H2 class="mt-5"></H2></div>
                        <div class="card-body">
                            <div class="row">

                            <div class="col-md-6">
                                <div class="form-group">
                                    <label for="">Date of Appointment</label>
                                    <input type="date" value="{{$data->appointment_date}}" class="form-control" name="appointment_date" required 
                                        min="{{ now()->toDateString() }}" 
                                        oninput="setMinDate(this)">
                                </div>
                            </div>


                            <div class="col-md-6">
                                <div class="form-group">
                                    <label for="">Time of Appointment</label>
                                    <select class="form-control" name="appointment_time" required>
                                        <option value="9:00 AM" {{ $data->appointment_time == "9:00 AM" ? 'selected' : '' }}>9:00 AM</option>
                                        <option value="11:00 AM" {{ $data->appointment_time == "11:00 AM" ? 'selected' : '' }}>11:00 AM</option>
                                        <option value="2:00 PM" {{ $data->appointment_time == "2:00 PM" ? 'selected' : '' }}>2:00 PM</option>
                                    </select>
                                </div>
                            </div>


                            <div class="col-md-6">
                                <div class="form-group">
                                    <label for="">Venue</label>
                                    <select class="form-control" name="appointment_venue" required>
                                        <option value="Nairobi Huduma Centre" {{ $data->appointment_venue == "Nairobi Huduma Centre" ? 'selected' : '' }}>Nairobi Huduma Centre</option>
                                        <option value="Kisumu Huduma Centre" {{ $data->appointment_venue == "Kisumu Huduma Centre" ? 'selected' : '' }}>Kisumu Huduma Centre</option>
                                        <option value="Mombasa Huduma Centre" {{ $data->appointment_venue == "Mombasa Huduma Centre" ? 'selected' : '' }}>Mombasa Huduma Centre</option>
                                    </select>
                                </div>
                            </div>


                            </div> 
                        </div>
                        
                </div>
                <button type="submit" class="btn btn-md btn-primary mt-5 me-5" style="float: right;">Reschedule Appointment</button>
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