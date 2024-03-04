@extends('includes.main')
@section('pageTitle', 'My Application')
@section('content')

    <div class="container-fluid page-body-wrapper">
        <div allign="center" style="padding:100px;" class="">
        @if(count($data) > 0)
            <table style="border:1px solid green;">

                <tr style="background-color:#17C653; border:1px solid green;" >
                    <th style="padding:10px; font-size:20px; border:1px solid green;">Application ID</th>
                    <th style="padding:10px; font-size:20px; border:1px solid green;">Personal Details ID</th>
                    <th style="padding:10px; font-size:20px; border:1px solid green;">Birthplaces ID</th>
                    <th style="padding:10px; font-size:20px; border:1px solid green;">Documents ID</th>
                    <th style="padding:10px; font-size:20px; border:1px solid green;">Application Status</th>
                    <th style="padding:10px; font-size:20px; border:1px solid green;">Delete</th>
                    <th style="padding:10px; font-size:20px; border:1px solid green;">Update</th>
                </tr>

                @foreach($data as $applications)
                <tr align="center" style="border:1px solid green;">
                    <td style="border:1px solid green;"><b>{{$applications->id}}</b></td>
                    <td style="border:1px solid green;"><b>{{$applications->personal_details_id}}</b></td>
                    <td style="border:1px solid green;"><b>{{$applications->birthplaces_id}}</b></td>
                    <td style="border:1px solid green;"><b>{{$applications->documents_id}}</b></td>
                    <td style="border:1px solid green;"><b>{{$applications->application_status}}</b></td>
                    <td><a onclick="return confirm('Are you sure you want to delete this application')" class="btn btn-danger" href="{{url('deleteapplication',$applications->id)}}">Delete</a></td>
                    <td><a class="btn btn-primary" href="{{url('update_application',$applications->id)}}">Update</a></td>
                </tr>
                @endforeach
            </table>
            @else
            <div class="card shadow">
                <div class="card-header"></div>
                <div class="card-body">
                    <h1  align="center" style="color:darkgreen;">YOU HAVE NO APPLICATION</h1>
                </div>
            </div>
        @endif
        </div>
    </div>

@endsection