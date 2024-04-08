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

            @if (session()->has('success'))
                <div class="alert alert-success alert-dismissible fade show mt-5 " role="alert">
                    {{ session('success') }}
                    <button type="button" class="btn-close btn btn-danger btn btn-sm mt-2" data-bs-dismiss="alert" aria-label="Close"></button>
                </div>
            @endif  



    <div align="center" style="padding: 50px;" class="text-center mx-auto shadow">


        <div class="table-responsive">
            <table class="table table-bordered mx-auto" style="width: 100%; max-width: none;">

                <thead>
                    <tr class="bg-secondary">
                        <th> id</th>
                        <th>User id</th>
                        <th>Amount</th>
                        <th>Created at</th>
                    </tr>
                </thead>

                <tbody>
                    @foreach($data as $appoint)
                    <tr align="center">
                        <td>{{$appoint->id}}</td>
                        <td>{{$appoint->user_id}}</td>
                        
                        <td>{{$appoint->amount}}</td>

                        <td style="color: #000;">
                           {{$appoint->created_at}}
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