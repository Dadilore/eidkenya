@extends('admin.layouts.main')
@section('pageTitle', 'Users')
@section('content')

<div class="container mt-5">
    <div class="d-flex justify-content-center"> 
        <div class="col-md-12">
            <div class="card shadow">
                <div class="card-header"></div>
                <div class="card-body">
                        <form action="{{ url('/sendsms') }}" method="get">
                        @csrf
                                <label>Receiver Phone Number </label>
                                <input class="form-control " type="number" name="phone" />

                                <input class="btn btn-primary mt-5" type="submit" value="send SMS" />
                        </form>
                </div>
            </div>
        </div>
    </div>
</div>

@endsection
