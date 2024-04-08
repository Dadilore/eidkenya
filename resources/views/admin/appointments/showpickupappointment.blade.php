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
                                    <span class="text-gray-900 text-hover-primary fs-2 fw-bold me-1">ID Pickup Appointments </span>
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


        <div align="center"  class="text-center mx-auto shadow">

        <div class="table-responsive">
            <table class="table table-bordered mx-auto" style="width: 100%; max-width: none;">

                <thead>
                    <tr class="bg-secondary">
                        <th>Applicant id</th>
                        <th>Appointment Date</th>
                        <th>Appointment_time</th>
                        <th>Appointment_venue</th>
                        <th>Status</th>
                        <th>Actions</th>
                    </tr>
                </thead>

                <tbody>
                    @foreach($data as $appoint)
                    <tr align="center">
                        <td>{{$appoint->user_id}}</td>
                        <td>{{$appoint->appointment_date}}</td>
                        <td>{{$appoint->appointment_time}}</td>
                        <td>{{$appoint->appointment_venue}}</td>

                        <td style="color: #000;">
                            <p style="background-color:#FF6961; border-radius:10px; margin: 0;">{{$appoint->status}}</p>
                        </td>

                        <td>
                            <div class="btn-group">
                                <button type="button" class="btn btn-primary dropdown-toggle" data-bs-toggle="dropdown" aria-expanded="false">
                                    Actions
                                </button>
                                <ul class="dropdown-menu mt-1">
                                    <li>
                                        <a class="dropdown-item" onclick="return confirm('Are you sure you want to approve this appointment?')" href="{{ url('approved2', $appoint->id) }}">Approve</a>
                                    </li>
                                    <li>
                                        <a class="dropdown-item" onclick="return confirm('Are you sure you want to cancel this appointment?')" href="{{ url('cancelled2', $appoint->id) }}">Cancel</a>
                                    </li>
                                </ul>
                            </div>
                        </td>
                    </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
    </div>

    
    <nav aria-label="...">
        <ul class="pagination">
            {{ $data->links('pagination::bootstrap-4') }}
        </ul>
    </nav>

</div>



@endsection
