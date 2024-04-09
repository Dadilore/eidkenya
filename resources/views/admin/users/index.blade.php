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

    @if (session()->has('success'))
        <div class="container mt-5 ">
        <div class="alert alert-success alert-dismissible fade show mt-5 " role="alert">
            {{ session('success') }}
            <button type="button" class="btn-close btn btn-danger me-5 " data-bs-dismiss="alert" aria-label="Close"></button>
        </div>
        </div>
    @endif

    <div align="center" style="padding:30px;"  class="text-center mx-auto shadow" >



        <a class="text-start btn btn-primary mx-auto ms-5 float-start" style="margin-bottom:5%;" href="{{ url('generate_pdf') }}">Export Users</a>


        <a class="text-end btn btn-primary mx-auto ms-5 float-end" style="margin-bottom:5%;" href="{{ route('admin.users.create') }}">Add User</a>


        <div class="table-responsive">
    <table class="table table-bordered mx-auto" style="width: 100%; max-width: none;">
        <thead>
            <tr class="bg-secondary">
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
        </thead>
        <tbody>
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
                    <p style="background-color:#FF6961; border-radius:10px; margin: 0;">{{$appoint->status}}</p>
                </td>

                <td>{{$appoint->role}}</td>

                <td>
                    <div class="btn-group">
                        <button type="button" class="btn btn-primary dropdown-toggle" data-bs-toggle="dropdown" aria-expanded="false">
                            Actions
                        </button>
                        <ul class="dropdown-menu mt-1">
                            <li>
                                <a class="dropdown-item" onclick="return confirm('Are you sure you want to delete this user ?')" href="{{ route('admin.users.destroy', ['id' => $appoint->id]) }}">Delete</a>
                            </li>
                            <li>
                                <a class="dropdown-item" href="{{ route('admin.users.edit', ['id' => $appoint->id]) }}">Update</a>

                            </li>
                        </ul>
                    </div>
                </td>
            </tr>
            @endforeach
        </tbody>
    </table>
</div>


        <nav aria-label="...">
            <ul class="pagination">
                {{ $data->links('pagination::bootstrap-4') }}
            </ul>
        </nav>





    </div>

    

@endsection
