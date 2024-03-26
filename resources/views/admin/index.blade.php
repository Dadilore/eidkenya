@extends('admin.layouts.main')
@section('pageTitle', 'Admin Dashboard')
@section('content')

<!--begin::Content-->
<div id="kt_app_content" class="app-content flex-column-fluid">
      <!--begin::Content container-->
      <div id="kt_app_content_container" class="app-container container-xxl">
        <!--begin::Row-->
        <div class="row g-5 g-xl-10 mb-xl-10">
          <!--begin::Col-->
          <div class="col-md-6 col-lg-6 col-xl-6 col-xxl-3 mb-md-5 mb-xl-10">

          <div class="card-body pt-9 pb-0">
				<!--begin::Details-->
				<div class="d-flex flex-wrap flex-sm-nowrap">
					<!--begin: Pic-->
					<div class="me-7 mb-4">
						<div class="symbol symbol-50px symbol-lg-60px symbol-fixed position-relative">
							<img style="height:70%;" src="{{asset ('assets/images/profile/augustine.jpg') }}" alt="image">
						</div>
					</div>
					<div class="flex-grow-1">
						<div class="d-flex justify-content-between align-items-start flex-wrap mb-2">
							<div class="d-flex flex-column">
								<div class="d-flex align-items-center mb-2">
									<span class="text-gray-900 text-hover-primary fs-2 fw-bold me-1">{{ Auth::user()->full_name() }}</span>
								</div>                        
								<div class="d-flex flex-wrap fw-semibold fs-6 mb-4 pe-2">
									<span class="d-flex align-items-center text-gray-500 text-hover-primary me-5 mb-2">
										@if(Auth::user()->sex === 'F')Female @else Male @endif
									</span>
									<span class="d-flex align-items-center text-gray-500 text-hover-primary me-5 mb-2">
										<i class="ki-outline ki-calendar fs-4 me-1"></i>                                {{ Auth::user()->dob }}
									</span>
									<span class="d-flex align-items-center text-gray-500 text-hover-primary me-5 mb-2">
										<i class="ki-outline ki-sms fs-4 me-1"></i>                                {{ Auth::user()->email }}
									</span>
									<span class="d-flex align-items-center text-gray-500 text-hover-primary mb-2">
										<i class="ki-outline ki-phone fs-4 me-1"></i>                                {{ Auth::user()->phone }}
									</span>
								</div>
							</div>
						</div>
					</div>
				</div>
				<ul class="nav nav-stretch nav-line-tabs nav-line-tabs-2x border-transparent fs-5 fw-bold">
					<li class="nav-item mt-2">
						<a class="nav-link text-active-primary ms-0 me-10 pt-3 pb-2 active" href="{{ route('admin.index') }}">Dashboard</a>
					</li>
					<li class="nav-item mt-2">
						<a class="nav-link text-active-primary ms-0 me-10 pt-3 pb-2 " href="{{ route('admin.index') }}">Recent Applications</a>
					</li>
					<li class="nav-item mt-2">
						<a class="nav-link text-active-primary ms-0 me-10 pt-3 pb-2 " href="{{ route('admin.index') }}">Notifications</a>
					</li>
				</ul>
			</div>

			


      </div>
      <!--end::Content container-->
	  <hr style="height: 4px; background-color: #000; border: none; margin: 20px 0;">

	  <div class="row">
    <div class="col-md-3">
        <div class="card card-body bg-primary text-white mb-3 h-100">
            <label for="">Total Applications</label>
            <h1>{{$totalApplications}}</h1>
            <a href="#" class="text-white">View</a>
        </div>
    </div>

    <div class="col-md-3">
        <div class="card card-body bg-success text-white mb-3 h-100">
            <label for="">Today Applications</label>
            <h1>{{$todayApplications}}</h1>
            <a href="#" class="text-white">View</a>
        </div>
    </div>

    <div class="col-md-3">
        <div class="card card-body bg-warning text-white mb-3 h-100">
            <label for="">This Month Applications</label>
            <h1>{{$thisMonthApplications}}</h1>
            <a href="#" class="text-white">View</a>
        </div>
    </div>

    <div class="col-md-3">
        <div class="card card-body bg-danger text-white mb-3 h-100">
            <label for="">This Year Applications</label>
            <h1>{{$thisYearApplications}}</h1>
            <a href="#" class="text-white">View</a>
        </div>
    </div>

    <div class="col-md-3 mt-3"> <!-- Adjust margin top for smaller screens -->
        <div class="card card-body bg-info text-white mb-3 h-100">
            <label for="">Total Biometrics Capture Appointments</label>
            <h1>{{$totalAppointments}}</h1>
            <a href="#" class="text-white">View</a>
        </div>
    </div>

    <div class="col-md-3  mt-3"> <!-- Adjust margin top for smaller screens -->
        <div class="card card-body bg-dark text-white mb-3 h-100">
            <label for="">Total ID pickup Appointments</label>
            <h1>{{$totalPickupAppointments}}</h1>
            <a href="#" class="text-white">View</a>
        </div>
    </div>

    <div class="col-md-3 mt-3">
        <div class="card card-body bg-info text-white mb-3 h-100">
            <label for="">All Users</label>
            <h1>{{$totalAllUsers}}</h1>
            <a href="#" class="text-white">View</a>
        </div>
    </div>

    <div class="col-md-3 mt-3 ">
        <div class="card card-body bg-dark text-white mb-3 h-100">
            <label for="">Total Users</label>
            <h1>{{$totalUser}}</h1>
            <a href="#" class="text-white">View</a>
        </div>
    </div>

    <div class="col-md-3 mt-3">
        <div class="card card-body bg-dark text-white mb-3 h-100">
            <label for="">Total Admin</label>
            <h1>{{$totalAdmin}}</h1>
            <a href="#" class="text-white">View</a>
        </div>
    </div>
</div>


		<!--begin::Card widget 4-->
<div class="card card-flush h-md-50 mb-5 mb-xl-10">
    <!--begin::Header-->
    <div class="card-header pt-5">
        <!--begin::Title-->
        <div class="card-title d-flex flex-column">
            <!--begin::Info-->
            <div class="d-flex align-items-center">
                <!--begin::Amount-->
                <span class="fs-2hx fw-bold text-gray-900 me-2 lh-1 ls-n2">{{$totalApplications}}</span>
                <!--end::Amount-->
            </div>
            <!--end::Info-->
            <!--begin::Subtitle-->
            <span class="text-gray-500 pt-1 fw-semibold fs-6">Total Applications</span>
            <!--end::Subtitle-->
        </div>
        <!--end::Title-->
    </div>
    <!--end::Header-->
    <!--begin::Card body-->
    <div class="card-body pt-2 pb-4 d-flex align-items-center">
        <!--begin::Chart-->
        <div class="d-flex flex-center me-5 pt-2" id="chartContainer">
            <div id="kt_card_widget_4_chart" style="min-width: 70px; min-height: 70px"></div>
        </div>
        <!--end::Chart-->
        <!--begin::Labels-->
        <div class="d-flex flex-column content-justify-center w-100">
            <!--begin::Label-->
            <div class="d-flex fs-6 fw-semibold align-items-center">
                <!--begin::Bullet-->
                <div class="bullet w-8px h-6px rounded-2 bg-danger me-3"></div>
                <!--end::Bullet-->
                <!--begin::Label-->
                <div class="text-gray-500 flex-grow-1 me-4">New Applications</div>
                <!--end::Label-->
                <!--begin::Stats-->
                <div class="fw-bolder text-gray-700 text-xxl-end">{{$newApplications}}</div>
                <!--end::Stats-->
            </div>
            <!--end::Label-->
            <!--begin::Label-->
            <div class="d-flex fs-6 fw-semibold align-items-center my-3">
                <!--begin::Bullet-->
                <div class="bullet w-8px h-6px rounded-2 bg-primary me-3"></div>
                <!--end::Bullet-->
                <!--begin::Label-->
                <div class="text-gray-500 flex-grow-1 me-4">Replacement Applications</div>
                <!--end::Label-->
                <!--begin::Stats-->
                <div class="fw-bolder text-gray-700 text-xxl-end">{{$replacementApplications}}</div>
                <!--end::Stats-->
            </div>
            <!--end::Label-->
            <!--begin::Label-->
            <div class="d-flex fs-6 fw-semibold align-items-center">
                <!--begin::Bullet-->
                <div class="bullet w-8px h-6px rounded-2 me-3" style="background-color: #E4E6EF"></div>
                <!--end::Bullet-->
                <!--begin::Label-->
                <div class="text-gray-500 flex-grow-1 me-4">Change Of Particulars Applications</div>
                <!--end::Label-->
                <!--begin::Stats-->
                <div class="fw-bolder text-gray-700 text-xxl-end">{{$changeOfParticulars}}</div>
                <!--end::Stats-->
            </div>
            <!--end::Label-->
        </div>
        <!--end::Labels-->
    </div>
    <!--end::Card body-->
</div>
<!--end::Card widget 4-->




	</div>
    <!--end::Content-->

	<script>
    // Function to adjust chart size based on the number of stats
    function adjustChartSize() {
        var totalStats = 3; // Total number of stats displayed
        var chartContainer = document.getElementById('chartContainer');
        var chartWidth = totalStats * 100; // Adjust width based on number of stats
        chartContainer.style.minWidth = chartWidth + 'px';
    }

    // Call the function to adjust chart size
    adjustChartSize();
</script>

@endsection


           