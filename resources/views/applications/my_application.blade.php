@extends('includes.main')
@section('pageTitle', 'My Application')
@section('content')

<div class="container-fluid page-body-wrapper ">
   
    <div class="card my-5 mb-xxl-8 bg-light-primary">
        <div class="card-body pt-9 pb-0">
            <div class="d-flex flex-wrap flex-sm-nowrap">
                <div class="flex-grow-1">
                    <div class="d-flex justify-content-between align-items-start flex-wrap mb-2">
                        <div class="d-flex flex-column">
                            <div class="d-flex align-items-center mb-2">
                                <span class="text-gray-900 text-hover-primary fs-2 fw-bold me-1">My Application </span>
                            </div>
                            <div class="d-flex flex-wrap fw-semibold fs-6 mb-4 pe-2">
                                <span class="d-flex align-items-center text-gray-500 text-hover-primary me-5 mb-2">
                                    You can delete or edit you application before it is confirmed and your biometrics taken  <span class="fw-bolder ms-1"></span></span>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <div  align="center" style="padding: 100px;  margin-right: 60px; " class="text-center mx-auto shadow" style="max-width: 800px;">

        @if (session()->has('success'))
            <div class="container mt-5">
                <div class="alert alert-success alert-dismissible fade show mt-5" role="alert">
                    {{ session('success') }}
                    <button type="button" class="btn-close btn btn-danger me-5 mt-2" data-bs-dismiss="alert" aria-label="Close"></button>
                </div>
            </div>
        @endif

        @if(count($data) > 0)
        <table class="table table-bordered "  style="margin-right: 20px; width: 80%;">

            <tr class="bg-secondary">
                <th>Application ID</th>
                <th>Application type</th>
                <th> Status</th>
                <th>Actions</th>
            </tr>

            @foreach($data as $applications)
                <tr align="center">
                    <td>{{$applications->id}}</td>
                    <td>{{$applications->application_type}}</td>         
                    <td style="color: #000;" ><p>{{$applications->application_status}}</p></td>
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
