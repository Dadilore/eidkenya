@extends('admin.layouts.main')
@section('pageTitle', 'Applications')
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



<div align="center" style="padding: 100px;  margin-right: 60px; " class="text-center mx-auto shadow" style="max-width: 800px;">

<a class="text-start btn btn-primary mx-auto ms-5 float-start" style="margin-bottom:15%;" href="{{ url('generate_applications_pdf') }}">Export Applications</a>


<a class="text-end btn btn-primary mx-auto ms-5 float-end" style="margin-bottom:15%;" href="#">Add Application</a>

    <table class="table table-bordered mx-auto" style="margin-right: 0px; width: 100%;">

        <tr class="bg-secondary">

            <th>User id</th>
            <th>Application id</th>
            <th>Application type</th>
            <th>Status</th>
            <th>Actions</th>
            
        </tr>

        @foreach($data as $appoint)
        <tr align="center">
            <td>{{$appoint->user_id}}</td>
            <td>{{$appoint->id}}</td>
            <td>{{$appoint->application_type}}</td>

            <td style="color: #000;">
                <p style="background-color:#FF6961; border-radius:10px; me-0">{{$appoint->application_status}}
                </p>
            </td>



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

    <nav aria-label="...">
        <ul class="pagination">
            {{ $data->links('pagination::bootstrap-4') }}
        </ul>
    </nav>



</div>

@endsection