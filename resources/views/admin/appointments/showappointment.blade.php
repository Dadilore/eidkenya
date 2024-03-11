@extends('admin.layouts.main')
@section('pageTitle', 'Appointments')
@section('content')

    <div class="container">
        <div class="card my-5 mb-xxl-8 bg-light-primary">
            <div class="card-body pt-9 pb-0">
                <div class="d-flex flex-wrap flex-sm-nowrap">
                    <div class="flex-grow-1">
                        <div class="d-flex justify-content-between align-items-start flex-wrap mb-2">
                            <div class="d-flex flex-column">
                                <div class="d-flex align-items-center mb-2">
                                    <span class="text-gray-900 text-hover-primary fs-2 fw-bold me-1">Appointments </span>
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

    <div class="card">
        <div class="card-header">
            <div class="card-body">
                <div class=" page-body-wrapper">
                    <div allign="center" style="padding:100px;" class="">
                        <table>
                            <tr style="background-color:#17C653;" >
                                <th style="padding:10px;">Applicant id</th>
                                <th style="padding:10px;">Appointment Date</th>
                                <th style="padding:10px;">Appointment_time</th>
                                <th style="padding:10px;">Appointment_venue</th>
                                <th style="padding:10px;">Status</th>
                                <th style="padding:1px;">Actions</th>
                            </tr>

                            @foreach($data as $appoint)

                            <tr allign="center" style="padding:100px;" >
                                <td>{{$appoint->user_id}}</td>
                                <td>{{$appoint->appointment_date}}</td>
                                <td>{{$appoint->appointment_time}}</td>
                                <td>{{$appoint->appointment_venue}}</td>
                                <td>{{$appoint->status}}</td>
                                <td>
                                    <div class="btn-group">
                                        <button type="button" class="btn btn-primary dropdown-toggle md" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                            Actions
                                        </button>
                                        <div class="dropdown-menu">
                                            <a class="dropdown-item btn" onclick="return confirm('Are you sure you want to approve this appointment?')" href="{{ url('approved', $appoint->id) }}">Approve</a>

                                            <a class="dropdown-item btn mt-3" onclick="return confirm('Are you sure you want to cancel this appointment?')" href="{{ url('cancelled', $appoint->id) }}">Cancel</a>

                                            <!-- <a class="dropdown-item btn btn-success mt-3" onclick="return confirm('Are you sure you want to approve payment of this appointment?')" href="{{ url('paid', $appoint->id) }}">paid</a>

                                            <a class="dropdown-item btn btn-success mt-3" onclick="return confirm('Are you sure you want to cancel this appointment?')" href="{{ url('cancelled', $appoint->id) }}">processed</a>

                                            <a class="dropdown-item btn btn-success mt-3" onclick="return confirm('Are you sure you want to cancel this appointment?')" href="{{ url('cancelled', $appoint->id) }}">Printing</a>

                                            <a class="dropdown-item btn btn-success mt-3" onclick="return confirm('Are you sure you want to cancel this appointment?')" href="{{ url('cancelled', $appoint->id) }}">Picked up</a> -->

                                        </div>
                                    </div>
                                </td>

                            </tr>

                            @endforeach
                        </table>
                    </div>
                </div> 
            </div>
        </div>
    </div>



@endsection
