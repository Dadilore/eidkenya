@extends('includes.main')
@section('pageTitle', 'Home')
@section('content')

<!--begin::Card widget 16-->
<div class="card card-flush bgi-no-repeat bgi-size-contain bgi-position-x-center border-0 h-md-50 mb-5 mt-5 mb-xl-10" style="background-color: green">
    <!--begin::Header-->
    <div class="card-header pt-5">
        <!--begin::Title-->
        <div class="card-title d-flex flex-column">
            <!--begin::Amount-->
            <span class="fs-2hx fw-bold text-white me-2 lh-1 ls-n2">application tracking</span>
            <!--end::Amount-->

        </div>
        <!--end::Title-->
    </div>
    <!--end::Header-->
    <!--begin::Card body-->
    <div class="card-body d-flex align-items-end pt-0">
        <!--begin::Progress-->
        <div class="d-flex align-items-center flex-column mt-3 w-100">
            <div class="d-flex justify-content-between fw-bold fs-6 text-white opacity-50 w-100 mt-auto mb-2">
                <span>application submitted</span>
                <span>paid</span>
                <span>biometrics caputured</span>
                <span>Processed</span>
                <span>Printing</span>
                <span>pickup</span>
            </div>
            <div class="h-8px mx-3 w-100 bg-light-danger rounded">
                <div class="bg-danger rounded h-8px" role="progressbar" style="width: 90%;" aria-valuenow="12" aria-valuemin="0" aria-valuemax="100"></div>
            </div>

            
        </div>
        <!--end::Progress-->
    </div>
    <!--end::Card body-->
</div>
<!--end::Card widget 16-->

<script>
    // Assuming progress is a value between 0 and 100
    var progress = 12;

    // Set the width of the progress bar dynamically
    document.getElementById('progressBar').style.width = progress + '%';
</script>

@endsection