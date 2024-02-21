@extends('includes.main')
@section('pageTitle', 'Home')
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
                <th style="padding:10px;">Approved</th>
                <th style="padding:10px;">Cancelled</th>
            </tr>

            @foreach($data as $appoint)

            <tr allign="center" style="padding:100px;" >
                <td>{{$appoint->user_id}}</td>
                <td>{{$appoint->appointment_date}}</td>
                <td>{{$appoint->appointment_time}}</td>
                <td>{{$appoint->appointment_venue}}</td>
                <td>{{$appoint->status}}</td>
                <td>
                    <a class="btn btn-primary"  onclick="return confirm('are you sure you want to approve this appointment ?')" href="{{ url('approved', $appoint-> id) }}">Approve</a>
                </td>
                <td>
                    <a class="btn btn-danger"  onclick="return confirm('are you sure you want to cancell this appointment ?')" href="{{ url('cancelled', $appoint-> id) }}">Cancell</a>
                </td>
            </tr>

            @endforeach
        </table>
    </div>
   </div> 

@endsection
