@extends('includes.main')
@section('pageTitle', 'My Appointment')
@section('content')
<div class="card">
<div class="card-header bg-primary "><H2 class="mt-5">MY APPOINTMENT </H2></div>
<div class="card-body">
    <div allign="center" style="padding:70px;">
        <table style="border:1px solid green;">
            <tr style="background-color:#17C653; border:1px solid green;">
                <th style="padding:10px; font-size:20px; border:1px solid green; ">Appointment Date</th>
                <th style="padding:10px; font-size:20px; border:1px solid green; ">Appointment Time</th>
                <th style="padding:10px; font-size:20px; border:1px solid green; ">Appointment Venue</th>
                <th style="padding:10px; font-size:20px; border:1px solid green; ">Status</th>
                <th style="padding:10px; font-size:20px; border:1px solid green; ">Action</th>
            </tr>

            @foreach($appoint as $appoints)

            <tr style="border:1px solid green; allign:center;">
                <td style="border:1px solid green;">{{$appoints->appointment_date}}</td>
                <td style="border:1px solid green;">{{$appoints->appointment_time}}</td>
                <td style="border:1px solid green;">{{$appoints->appointment_venue}}</td>  
                <td style="border:1px solid green;">{{$appoints->status}}</td> 
                <td style="justify_content:space between;">
                    <a class="btn btn-danger md" onclick="return confirm('are you sure you want to delete this ?')" href="{{url('cancel_appoint',$appoints->id)}}">Cancel</a><br>
                    <!-- <a class="btn btn-primary md" href="">Reschedule</a> -->
                </td>
            </tr>

            @endforeach
            
        </table>
        
    </div>
</div>
</div>

@endsection
