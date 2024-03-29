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
    </div>
    <!--end::Content-->

@endsection
           