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
                                <span class="text-gray-900 text-hover-primary fs-2 fw-bold me-1">Generate activity Logs </span>
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

    <center>
        <div class="col-md-8 card shadow"  style="padding:20px;">
            <div class="card-header" style="font-size:30px;"><b>Activity Logs</b></div>
            <div class="card-body">
                <form action="{{ route('generate_log') }}" method="GET">
                    

                    <div class="col-md-6">
                        <label for="month" class="required">Select Month:</label>
                        <div class="fv-row mb-8">
                            <select id="month" name="month" class="form-control bg-transparent @error('month') is-invalid @enderror">
                            <option value="1">January</option>
                            <option value="2">February</option>
                            <option value="3">March</option>
                            <option value="4">April</option>
                            <option value="5">May</option>
                            <option value="6">June</option>
                            <option value="7">July</option>
                            <option value="8">August</option>
                            <option value="9">September</option>
                            <option value="10">October</option>
                            <option value="11">November</option>
                            <option value="12">December</option>
                            </select>
                        </div>
                    </div>

                    <div class="col-md-6">
                        <label for="year" class="required">Select Year:</label>
                        <div class="fv-row mb-8">
                            <select id="year" name="year" class="form-control bg-transparent @error('year') is-invalid @enderror">
                            @php
                            $currentYear = date('Y');
                            $startYear = 1970; // Change this if you want to start from a different year
                            @endphp
                            @for ($i = $currentYear; $i >= $startYear; $i--)
                                <option value="{{ $i }}">{{ $i }}</option>
                            @endfor
                            </select>
                        </div>
                    </div>

                    <button class="btn btn-danger" type="submit">Download Logs</button>
                </form>
            </div>
        </div>
    </center>

@endsection