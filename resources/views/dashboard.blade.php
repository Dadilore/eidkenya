@extends('includes.main')
@section('pageTitle', 'Admin Dshboard')
@section('content')

<div id="kt_app_content" class="app-content  flex-column-fluid ">
	
	<div id="kt_app_content_container" class="app-container  container-xxl ">
		<div class="card my-5 mb-xxl-8" style="background-color: #f2f7f2">
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
						<a class="nav-link text-active-primary ms-0 me-10 pt-3 pb-2 active" href="{{ route('dashboard') }}">Dashboard</a>
					</li>
					<li class="nav-item mt-2">
						<a class="nav-link text-active-primary ms-0 me-10 pt-3 pb-2 " href="{{ route('dashboard') }}">Recent Applications</a>
					</li>
					<li class="nav-item mt-2">
						<a class="nav-link text-active-primary ms-0 me-10 pt-3 pb-2 " href="{{ route('dashboard') }}">Notifications</a>
					</li>
				</ul>
			</div>
		</div>
		<div class="row gy-5 g-xl-10">
			<div class="col-xl-4 mb-xl-10">
				<div class="card h-md-100" dir="ltr"> 
					<div class="card-body d-flex flex-column flex-center">
						<div class="mb-2">
							<h1 class="fw-semibold text-gray-800 text-center">
								APPLY FOR <br>
								<span class="fw-bolder"> New National ID</span>
							</h1>
							<div class="py-10 text-center">
								<img src="{{ asset('assets/images/icons/new_icon.webp') }}" class="theme-light-show w-200px" alt="">
							</div>
						</div>
						<div class="text-center mb-1"> 
							<a class="btn btn-sm btn-primary me-2" href="{{route('applications.create')}}">
								Start Application
							</a>
							<a class="btn btn-sm btn-light">
								Requirements
							</a>
						</div>
					</div>
				</div>
			</div>
			<div class="col-xl-4 mb-xl-10">
				<div class="card h-md-100" dir="ltr"> 
					<div class="card-body d-flex flex-column flex-center">
						<div class="mb-2">
							<h1 class="fw-semibold text-gray-800 text-center">
								APPLY FOR <br>
								<span class="fw-bolder"> ID Replacement</span>
							</h1>
							<div class="py-10 text-center">
								<img src="{{ asset('assets/images/icons/replacement_icon.webp') }}" class="theme-light-show w-200px" alt="">
							</div>
						</div>
						<div class="text-center mb-1"> 
							<a class="btn btn-sm btn-primary me-2" href="{{route('applications.create')}}">
								Start Application
							</a>
							<a class="btn btn-sm btn-light" data-bs-toggle="modal" data-bs-target="#kt_modal_upgrade_plan">
								Requirements
							</a>
						</div>
					</div>
				</div>
			</div>
			<div class="col-xl-4 mb-xl-10">
				<div class="card h-md-100" dir="ltr"> 
					<div class="card-body d-flex flex-column flex-center">
						<div class="mb-2">
							<h1 class="fw-semibold text-gray-800 text-center">
								APPLY FOR <br>
								<span class="fw-bolder"> Change of Particulars</span>
							</h1>
							<div class="py-10 text-center">
								<img src="{{ asset('assets/images/icons/particulars_icon.webp') }}" class="theme-light-show w-200px" alt="">
							</div>
						</div>
						<div class="text-center mb-1"> 
							<a class="btn btn-sm btn-primary me-2" href="{{route('applications.create')}}">
								Start Application
							</a>
							<a class="btn btn-sm btn-light">
								Requirements
							</a>
						</div>
					</div>
				</div>
			</div>
		</div>
		<div class="row g-4">
			<div class="col-xl-12">
				<div class="card">
					<!--begin::Card head-->
					<div class="card-header pt-4 flex-column">
						<!--begin::Title-->
						<div class="card-title d-flex align-items-center mb-4">            
							<i class="ki-outline ki-information fs-1 text-danger me-3 lh-0"></i> 	
				
							<span class="fw-bolder">Requirements and Instructions</span>
						</div>
						<div class="card-toolbar m-0">
							<ul class="nav nav-tabs nav-line-tabs nav-stretch fs-6 border-0 fw-bold" role="tablist">
								<li class="nav-item" role="presentation">
									<a id="new_id_requirements_tab" class="nav-link justify-content-center text-active-gray-800 active" data-bs-toggle="tab" role="tab" href="#new_id_requirements" aria-selected="true" tabindex="-1">
										New ID Application
									</a>
								</li>
								<li class="nav-item" role="presentation">
									<a id="id_replacement_requirements_tab" class="nav-link justify-content-center text-active-gray-800" data-bs-toggle="tab" role="tab" href="#id_replacement_requirements" aria-selected="false" tabindex="-1">
										ID Replacement
									</a>
								</li>
								<li class="nav-item" role="presentation">
									<a id="particulars_requirements_tab" class="nav-link justify-content-center text-active-gray-800" data-bs-toggle="tab" role="tab" href="#particulars_requirements" aria-selected="false" tabindex="-1">
										Change of Particulars
									</a>
								</li>
							</ul>
						</div>
					</div>
					<div class="card-body">
						<div class="tab-content">
							<div id="new_id_requirements" class="card-body p-0 tab-pane show active fade" role="tabpanel" aria-labelledby="new_id_requirements_tab">
								<p class="text-primary fw-semibold fs-5 mt-1 mb-7">This application applies to a citizen applying for new identification documents. The citizen must not have had an ID before.<br>
								The applicant should ensure to meet the below requirements</p>
								
								<div>
									<p class="fs-6 fw-semibold text-gray-600">
										1. A <b>duly filled and submitted</b> application form found <a href="{{ route('applications.create') }}">here.</a>
									</p>
									<div class="separator my-3"></div>
									<p class="fs-6 fw-semibold text-gray-600">
										2. Upload of <b>all required documents</b> including:-
										<ol type="a">
											<li>A copy of applicants Kenyan Birth Certificate.</li>
											<li>Copies of parents' Kenyan ID card.</li>
											<li>Recent passport-sized photo of applicant.</li>
										</ol>
									</p>
									<div class="separator my-3"></div>
									<p class="fs-6 fw-semibold text-gray-600">
										3. <b>KSH 1000</b> application fee payable to the Kenya High Commission.
									</p>
									<div class="separator my-3"></div>
									<p class="fs-6 fw-semibold text-gray-600">
										4. The applicant MUST avail themselves for <b>biometric capture</b> on the chosen date.
									</p>
									<div class="separator my-3"></div>
								</div>
							</div>
							<div id="id_replacement_requirements" class="card-body p-0 tab-pane fade" role="tabpanel" aria-labelledby="id_replacement_requirements_tab">
								<p class="text-primary fw-semibold fs-5 mt-1 mb-7">This application applies to a citizen applying to replace a lost/mutilated identification document or to get a duplicate of their identification document.<br>
								The applicant should ensure to meet the below requirements</p>
								<div>
									<p class="fs-6 fw-semibold text-gray-600">
										1. A <b>police report or notarised affidavit</b> explaining the circumstances of loss.
									</p>
									<div class="separator my-3"></div>
									<p class="fs-6 fw-semibold text-gray-600">
										2. A <b>duly filled and submitted</b> application form found <a href="{{ route('applications.create') }}">here.</a>
									</p>
									<div class="separator my-3"></div>
									<p class="fs-6 fw-semibold text-gray-600">
										2. Upload of <b>all required documents</b> including:-
										<ol type="a">
											<li>A copy of applicants Kenyan Birth Certificate.</li>
											<li>A copy of the applicant's original ID.</li>
											<li>Recent passport-sized photo of applicant.</li>
										</ol>
									</p>
									<div class="separator my-3"></div>
									<p class="fs-6 fw-semibold text-gray-600">
										3. <b>KSH 2000</b> application fee payable to the Kenya High Commission.
									</p>
									<div class="separator my-3"></div>
									<p class="fs-6 fw-semibold text-gray-600">
										4. The applicant MUST avail themselves for <b>biometric capture</b> on the chosen date.
									</p>
									<div class="separator my-3"></div>
								</div>
							</div>
							<div id="particulars_requirements" class="card-body p-0 tab-pane fade" role="tabpanel" aria-labelledby="particulars_requirements_tab">
								<p class="text-primary fw-semibold fs-5 mt-1 mb-7">This application applies to a citizen wishing to change details in their identification document.<br>
								The applicant should ensure to meet the below requirements</p>
								<div>
									<p class="fs-6 fw-semibold text-gray-600">
										1. A <b>duly filled and submitted</b> application form found <a href="{{ route('applications.create') }}">here.</a>
									</p>
									<div class="separator my-3"></div>
									<p class="fs-6 fw-semibold text-gray-600">
										2. Upload of <b>all required documents</b> including:-
										<ol type="a">
											<li>A copy of applicants Kenyan Birth Certificate.</li>
											<li>A copy of the applicant's original ID.</li>
											<li>Recent passport-sized photo of applicant.</li>
										</ol>
									</p>
									<div class="separator my-3"></div>
									<p class="fs-6 fw-semibold text-gray-600">
										3. <b>KSH 2000</b> application fee payable to the Kenya High Commission.
									</p>
									<div class="separator my-3"></div>
									<p class="fs-6 fw-semibold text-gray-600">
										4. The applicant MUST avail themselves for <b>biometric capture</b> on the chosen date.
									</p>
									<div class="separator my-3"></div>
								</div>
							</div>
				
							
				
							
						</div>
						<!--end::Tab Content-->
					</div>
					<!--end::Card body-->
				</div>
			</div>
		</div>
		{{-- <div class="row g-4">
			<div class="col-xl-12">
				<div class="card card-flush mb-5 mb-xl-10">
					<!--begin::Card header-->
					<div class="card-header pt-7">
						<!--begin::Title-->
						<h3 class="card-title align-items-start flex-column">
							<span class="card-label fw-bold text-gray-900">Requirements & Instructions</span>
						</h3>
						<!--end::Title-->
						<!--begin::Actions-->
						<div class="card-toolbar">
							<!--begin::Filters-->
							<div class="d-flex flex-stack flex-wrap gap-4">
								<!--begin::Destination-->
								<div class="d-flex align-items-center fw-bold">
									<!--begin::Label-->
									<div class="text-muted fs-7 me-2">Type</div>
									<!--end::Label-->
									<!--begin::Select-->
									<select class="form-select form-select-transparent text-gray-900 fs-7 lh-1 fw-bold py-0 ps-3 w-auto" data-control="select2" data-hide-search="true" data-dropdown-css-class="w-150px" data-placeholder="Select an option">
										<option></option>
										<option value="Show All" selected="selected">Show All</option>
										<option value="a">New Application</option>
										<option value="b">ID Replacement</option>
										<option value="c">Change of Particulars</option>
									</select>
									<!--end::Select-->
								</div>
								<!--end::Destination-->
								<!--begin::Status-->
								<div class="d-flex align-items-center fw-bold">
									<!--begin::Label-->
									<div class="text-muted fs-7 me-2">Status</div>
									<!--end::Label-->
									<!--begin::Select-->
									<select class="form-select form-select-transparent text-gray-900 fs-7 lh-1 fw-bold py-0 ps-3 w-auto" data-control="select2" data-hide-search="true" data-dropdown-css-class="w-150px" data-placeholder="Select an option" data-kt-table-widget-5="filter_status">
										<option></option>
										<option value="Show All" selected="selected">Show All</option>
										<option value="Pending Payment">Pending Payment</option>
										<option value="Biometric Capture">Biometric Capture</option>
										<option value="Waiting for Pickup">Waiting for Pickup</option>
										<option value="Completed">Completed</option>
									</select>
								</div>
							</div>
						</div>
					</div>
					<div class="card-body">
						<!--begin::Table-->
						<table class="table align-middle table-row-dashed fs-6 gy-3" id="kt_table_widget_5_table">
							<!--begin::Table head-->
							<thead>
								<!--begin::Table row-->
								<tr class="text-start text-gray-500 fw-bold fs-7 text-uppercase gs-0">
									<th class="min-w-150px">Application Type</th>
									<th class="text-end pe-3 min-w-100px">Application ID</th>
									<th class="text-end pe-3 min-w-150px">Date Applied</th>
									<th class="text-end pe-3 min-w-100px">Status</th>
								</tr>
								<!--end::Table row-->
							</thead>
							<tbody class="fw-bold text-gray-600">
								<tr>
									<td>
										<a href="" class="text-gray-900 text-hover-primary">New National ID</a>
									</td>
									<td class="text-end">#XGY-356</td>
									<td class="text-end">02 Apr, 2024</td>
									<td class="text-end">
										<span class="badge py-3 px-4 fs-7 badge-light-primary">Completed</span>
									</td>
								</tr>
								<tr>
									<td>
										<a href="" class="text-gray-900 text-hover-primary">Change of Particulars</a>
									</td>
									<td class="text-end">#YHD-047</td>
									<td class="text-end">01 Apr, 2024</td>
									<td class="text-end">
										<span class="badge py-3 px-4 fs-7 badge-light-danger">Pending Payment</span>
									</td>
								</tr>
								
							</tbody>
							<!--end::Table body-->
						</table>
						<!--end::Table-->
					</div>
					<!--end::Card body-->
				</div>
			</div>
		</div> --}}
	</div>
</div>			

									

@endsection
								