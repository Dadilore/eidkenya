@extends('admin.layouts.main')
@section('pageTitle', 'Appointments')
@section('content')

   <div class="container-fluid page-body-wrapper">
    <div allign="center" style="padding:100px;" class="">
        <table>
            <tr style="background-color:green;" >
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
                            <a class="dropdown-item btn btn-success" onclick="return confirm('Are you sure you want to approve this appointment?')" href="{{ url('approved', $appoint->id) }}">Approve</a>

                            <a class="dropdown-item btn btn-success mt-3" onclick="return confirm('Are you sure you want to cancel this appointment?')" href="{{ url('cancelled', $appoint->id) }}">Cancel</a>

                            <a class="dropdown-item btn btn-success mt-3" onclick="return confirm('Are you sure you want to approve payment of this appointment?')" href="{{ url('paid', $appoint->id) }}">paid</a>

                            <a class="dropdown-item btn btn-success mt-3" onclick="return confirm('Are you sure you want to cancel this appointment?')" href="{{ url('cancelled', $appoint->id) }}">processed</a>

                            <a class="dropdown-item btn btn-success mt-3" onclick="return confirm('Are you sure you want to cancel this appointment?')" href="{{ url('cancelled', $appoint->id) }}">Printing</a>

                            <a class="dropdown-item btn btn-success mt-3" onclick="return confirm('Are you sure you want to cancel this appointment?')" href="{{ url('cancelled', $appoint->id) }}">Picked up</a>

                        </div>
                    </div>
                </td>

            </tr>

            @endforeach
        </table>
    </div>
   </div> 

@endsection
