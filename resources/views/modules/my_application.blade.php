@extends('includes.main')
@section('pageTitle', 'My Application')
@section('content')

<div class="container-fluid page-body-wrapper ">
   
    <div align="center" style="padding: 100px;" class="mx-auto shadow " style="max-width: 800px;">
        @if (session()->has('success'))
            <div class="container mt-5">
                <div class="alert alert-success alert-dismissible fade show mt-5" role="alert">
                    {{ session('success') }}
                    <button type="button" class="btn-close btn btn-danger me-5 mt-2" data-bs-dismiss="alert" aria-label="Close"></button>
                </div>
            </div>
        @endif
        @if(count($data) > 0)
        <table class="table table-bordered " style="margin-right: 100px; ">

            <tr style="background-color:#17C653;">
                <th>Application ID</th>
                <th>Application type</th>
                <th> Status</th>
                <th>Actions</th>
            </tr>

            @foreach($data as $applications)
                <tr align="center">
                    <td>{{$applications->id}}</td>
                    <td>{{$applications->application_type}}</td>         
                    <td style="color: #8B0000;" >{{$applications->application_status}}</td>
                    <td>
                        <div class="btn-group">
                            <button type="button" class="btn btn-primary dropdown-toggle" data-bs-toggle="dropdown" aria-expanded="false">
                                Actions
                            </button>
                            <ul class="dropdown-menu mt-1">
                                <li><a class="dropdown-item" href="{{url('deleteapplication',$applications->id)}}" onclick="return confirm('Are you sure you want to delete this application')">Delete</a></li>
                                <li><a class="dropdown-item" href="{{url('update_application',$applications->id)}}">Update</a></li>
                            </ul>
                        </div>
                    </td>
                </tr>
            @endforeach
        </table>

        @else
        <div class="card shadow">
            <div class="card-header"></div>
            <div class="card-body">
                <h1 align="center" class="alert alert-danger mt-3 ">YOU HAVE NO APPLICATION</h1>
                <h5 class="alert alert-info mt-3 ">Go to the dashboard, select your application type and apply for an ID </h5>
            </div>
        </div>
        @endif
    </div>
</div>

@endsection
