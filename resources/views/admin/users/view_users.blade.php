@extends('admin.layouts.main')
@section('pageTitle', 'Users')
@section('content')

<div class="card my-5 mb-xxl-8 bg-light-primary">
    <div class="card-body pt-9 pb-0">
        <div class="d-flex flex-wrap flex-sm-nowrap">
            <div class="flex-grow-1">
                <div class="d-flex justify-content-between align-items-start flex-wrap mb-2">
                    <div class="d-flex flex-column">
                        <div class="d-flex align-items-center mb-2">
                            <span class="text-gray-900 text-hover-primary fs-2 fw-bold me-1">Users </span>
                        </div>
                        <div class="d-flex flex-wrap fw-semibold fs-6 mb-4 pe-2">
                            <span class="d-flex align-items-center text-gray-500 text-hover-primary me-5 mb-2">
                                <span class="fw-bolder ms-1"></span>
                            </span>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

<div class="container text-end"> 
    <button type="button" class="btn btn-primary mx-auto ms-5 float-end"><a href="" style="color:black;">Add user</a></button>
</div>

<div align="center" style="padding: 100px;  margin-right: 60px; " class="text-center mx-auto shadow" style="max-width: 800px;">

    <table class="table table-bordered mx-auto" style="margin-right: 20px; width: 80%;">

        <tr style="background-color:#17C653;">
            <th>User ID</th>
            <th>Surname</th>
            <th>Middle Name</th>
            <th>Other Names</th>
            <th>Email</th>
            <th>Phone</th>
            <th>Gender</th>
            <th>Date of Birth</th>
            <th>Status</th>
            <th>Role</th>
            <th>Actions</th>
        </tr>

        @foreach($data as $appoint)
        <tr align="center">
            <td>{{$appoint->id}}</td>
            <td>{{$appoint->surname}}</td>
            <td>{{$appoint->middle_name}}</td>
            <td>{{$appoint->name}}</td>
            <td>{{$appoint->email}}</td>
            <td>{{$appoint->phone}}</td>
            <td>{{$appoint->sex}}</td>
            <td>{{$appoint->dob}}</td>

            <td style="color: #000;">
                <p style="background-color:#FF6961; border-radius:10px; me-0">{{$appoint->status}}
                </p>
            </td>

            <td>{{$appoint->role}}</td>

            <td>
                <div class="btn-group">
                    <button type="button" class="btn btn-primary dropdown-toggle" data-bs-toggle="dropdown"
                        aria-expanded="false">
                        Actions
                    </button>
                    <ul class="dropdown-menu mt-1">
                        <li>
                            <a class="dropdown-item" href="">Delete
                            </a>
                        </li>

                        <li>
                            <a class="dropdown-item" href="">
                                Update
                            </a>
                        </li>

                    </ul>
                </div>
            </td>
        </tr>
        @endforeach
    </table>

    <!-- <div class="card shadow">
        <div class="card-header"></div>
        <div class="card-body">
            <h1 align="center" class="alert alert-danger mt-3 ">THERE ARE NO USERS</h1>

        </div>
    </div> -->

</div>

@endsection
