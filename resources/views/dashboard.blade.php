@extends('includes.main')
@section('pageTitle', 'Dashboard')
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
							<img src="{{asset ('user/media/avatars/300-2.jpg') }}" alt="image">
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
							<a class="btn btn-sm btn-primary me-2" href="{{route('application')}}">
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
							<a class="btn btn-sm btn-primary me-2" href="{{route('application')}}">
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
							<a class="btn btn-sm btn-primary me-2" href="{{route('application')}}">
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
										1. A <b>duly filled and submitted</b> application form found <a href="{{ route('application') }}">here.</a>
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
										2. A <b>duly filled and submitted</b> application form found <a href="{{ route('application') }}">here.</a>
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
										1. A <b>duly filled and submitted</b> application form found <a href="{{ route('application') }}">here.</a>
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

<div class="modal fade" id="kt_modal_upgrade_plan" tabindex="-1" aria-hidden="true">
	<!--begin::Modal dialog-->
	<div class="modal-dialog modal-xl">
		<!--begin::Modal content-->
		<div class="modal-content rounded">
			<!--begin::Modal header-->
			<div class="modal-header justify-content-end border-0 pb-0">
				<!--begin::Close-->
				<div class="btn btn-sm btn-icon btn-active-color-primary" data-bs-dismiss="modal">
					<i class="ki-outline ki-cross fs-1"></i>
				</div>
				<!--end::Close-->
			</div>
			<!--end::Modal header-->
			<!--begin::Modal body-->
			<div class="modal-body pt-0 pb-15 px-5 px-xl-20">
				<!--begin::Heading-->
				<div class="mb-13 text-center">
					<h1 class="mb-3">Requirements and Instructions</h1>
					<div class="text-muted fw-semibold fs-5">If you need more info, please check 
					<a href="#" class="link-primary fw-bold">Pricing Guidelines</a>.</div>
				</div>
				<!--end::Heading-->
				<!--begin::Plans-->
				<div class="d-flex flex-column">
					<!--begin::Nav group-->
					<div class="nav-group nav-group-outline mx-auto" data-kt-buttons="true">
						<button class="btn btn-color-gray-500 btn-active btn-active-secondary px-6 py-3 me-2 active" data-kt-plan="month">Monthly</button>
						<button class="btn btn-color-gray-500 btn-active btn-active-secondary px-6 py-3" data-kt-plan="annual">Annual</button>
					</div>
					<!--end::Nav group-->
					<!--begin::Row-->
					<div class="row mt-10">
						<!--begin::Col-->
						<div class="col-lg-6 mb-10 mb-lg-0">
							<!--begin::Tabs-->
							<div class="nav flex-column">
								<!--begin::Tab link-->
								<label class="nav-link btn btn-outline btn-outline-dashed btn-color-dark btn-active btn-active-primary d-flex flex-stack text-start p-6 active mb-6" data-bs-toggle="tab" data-bs-target="#kt_upgrade_plan_startup">
									<!--end::Description-->
									<div class="d-flex align-items-center me-2">
										<!--begin::Radio-->
										<div class="form-check form-check-custom form-check-solid form-check-success flex-shrink-0 me-6">
											<input class="form-check-input" type="radio" name="plan" checked="checked" value="startup" />
										</div>
										<!--end::Radio-->
										<!--begin::Info-->
										<div class="flex-grow-1">
											<div class="d-flex align-items-center fs-2 fw-bold flex-wrap">Startup</div>
											<div class="fw-semibold opacity-75">Best for startups</div>
										</div>
										<!--end::Info-->
									</div>
									<!--end::Description-->
									<!--begin::Price-->
									<div class="ms-5">
										<span class="mb-2">$</span>
										<span class="fs-3x fw-bold" data-kt-plan-price-month="39" data-kt-plan-price-annual="399">39</span>
										<span class="fs-7 opacity-50">/ 
										<span data-kt-element="period">Mon</span></span>
									</div>
									<!--end::Price-->
								</label>
								<!--end::Tab link-->
								<!--begin::Tab link-->
								<label class="nav-link btn btn-outline btn-outline-dashed btn-color-dark btn-active btn-active-primary d-flex flex-stack text-start p-6 mb-6" data-bs-toggle="tab" data-bs-target="#kt_upgrade_plan_advanced">
									<!--end::Description-->
									<div class="d-flex align-items-center me-2">
										<!--begin::Radio-->
										<div class="form-check form-check-custom form-check-solid form-check-success flex-shrink-0 me-6">
											<input class="form-check-input" type="radio" name="plan" value="advanced" />
										</div>
										<!--end::Radio-->
										<!--begin::Info-->
										<div class="flex-grow-1">
											<div class="d-flex align-items-center fs-2 fw-bold flex-wrap">Advanced</div>
											<div class="fw-semibold opacity-75">Best for 100+ team size</div>
										</div>
										<!--end::Info-->
									</div>
									<!--end::Description-->
									<!--begin::Price-->
									<div class="ms-5">
										<span class="mb-2">$</span>
										<span class="fs-3x fw-bold" data-kt-plan-price-month="339" data-kt-plan-price-annual="3399">339</span>
										<span class="fs-7 opacity-50">/ 
										<span data-kt-element="period">Mon</span></span>
									</div>
									<!--end::Price-->
								</label>
								<!--end::Tab link-->
								<!--begin::Tab link-->
								<label class="nav-link btn btn-outline btn-outline-dashed btn-color-dark btn-active btn-active-primary d-flex flex-stack text-start p-6 mb-6" data-bs-toggle="tab" data-bs-target="#kt_upgrade_plan_enterprise">
									<!--end::Description-->
									<div class="d-flex align-items-center me-2">
										<!--begin::Radio-->
										<div class="form-check form-check-custom form-check-solid form-check-success flex-shrink-0 me-6">
											<input class="form-check-input" type="radio" name="plan" value="enterprise" />
										</div>
										<!--end::Radio-->
										<!--begin::Info-->
										<div class="flex-grow-1">
											<div class="d-flex align-items-center fs-2 fw-bold flex-wrap">Enterprise 
											<span class="badge badge-light-success ms-2 py-2 px-3 fs-7">Popular</span></div>
											<div class="fw-semibold opacity-75">Best value for 1000+ team</div>
										</div>
										<!--end::Info-->
									</div>
									<!--end::Description-->
									<!--begin::Price-->
									<div class="ms-5">
										<span class="mb-2">$</span>
										<span class="fs-3x fw-bold" data-kt-plan-price-month="999" data-kt-plan-price-annual="9999">999</span>
										<span class="fs-7 opacity-50">/ 
										<span data-kt-element="period">Mon</span></span>
									</div>
									<!--end::Price-->
								</label>
								<!--end::Tab link-->
								<!--begin::Tab link-->
								<label class="nav-link btn btn-outline btn-outline-dashed btn-color-dark btn-active btn-active-primary d-flex flex-stack text-start p-6 mb-6" data-bs-toggle="tab" data-bs-target="#kt_upgrade_plan_custom">
									<!--end::Description-->
									<div class="d-flex align-items-center me-2">
										<!--begin::Radio-->
										<div class="form-check form-check-custom form-check-solid form-check-success flex-shrink-0 me-6">
											<input class="form-check-input" type="radio" name="plan" value="custom" />
										</div>
										<!--end::Radio-->
										<!--begin::Info-->
										<div class="flex-grow-1">
											<div class="d-flex align-items-center fs-2 fw-bold flex-wrap">Custom</div>
											<div class="fw-semibold opacity-75">Requet a custom license</div>
										</div>
										<!--end::Info-->
									</div>
									<!--end::Description-->
									<!--begin::Price-->
									<div class="ms-5">
										<a href="#" class="btn btn-sm btn-success">Contact Us</a>
									</div>
									<!--end::Price-->
								</label>
								<!--end::Tab link-->
							</div>
							<!--end::Tabs-->
						</div>
						<!--end::Col-->
						<!--begin::Col-->
						<div class="col-lg-6">
							<!--begin::Tab content-->
							<div class="tab-content rounded h-100 bg-light p-10">
								<!--begin::Tab Pane-->
								<div class="tab-pane fade show active" id="kt_upgrade_plan_startup">
									<!--begin::Heading-->
									<div class="pb-5">
										<h2 class="fw-bold text-gray-900">What’s in Startup Plan?</h2>
										<div class="text-muted fw-semibold">Optimal for 10+ team size and new startup</div>
									</div>
									<!--end::Heading-->
									<!--begin::Body-->
									<div class="pt-1">
										<!--begin::Item-->
										<div class="d-flex align-items-center mb-7">
											<span class="fw-semibold fs-5 text-gray-700 flex-grow-1">Up to 10 Active Users</span>
											<i class="ki-outline ki-check-circle fs-1 text-success"></i>
										</div>
										<!--end::Item-->
										<!--begin::Item-->
										<div class="d-flex align-items-center mb-7">
											<span class="fw-semibold fs-5 text-gray-700 flex-grow-1">Up to 30 Project Integrations</span>
											<i class="ki-outline ki-check-circle fs-1 text-success"></i>
										</div>
										<!--end::Item-->
										<!--begin::Item-->
										<div class="d-flex align-items-center mb-7">
											<span class="fw-semibold fs-5 text-gray-700 flex-grow-1">Analytics Module</span>
											<i class="ki-outline ki-check-circle fs-1 text-success"></i>
										</div>
										<!--end::Item-->
										<!--begin::Item-->
										<div class="d-flex align-items-center mb-7">
											<span class="fw-semibold fs-5 text-muted flex-grow-1">Finance Module</span>
											<i class="ki-outline ki-cross-circle fs-1"></i>
										</div>
										<!--end::Item-->
										<!--begin::Item-->
										<div class="d-flex align-items-center mb-7">
											<span class="fw-semibold fs-5 text-muted flex-grow-1">Accounting Module</span>
											<i class="ki-outline ki-cross-circle fs-1"></i>
										</div>
										<!--end::Item-->
										<!--begin::Item-->
										<div class="d-flex align-items-center mb-7">
											<span class="fw-semibold fs-5 text-muted flex-grow-1">Network Platform</span>
											<i class="ki-outline ki-cross-circle fs-1"></i>
										</div>
										<!--end::Item-->
										<!--begin::Item-->
										<div class="d-flex align-items-center">
											<span class="fw-semibold fs-5 text-muted flex-grow-1">Unlimited Cloud Space</span>
											<i class="ki-outline ki-cross-circle fs-1"></i>
										</div>
										<!--end::Item-->
									</div>
									<!--end::Body-->
								</div>
								<!--end::Tab Pane-->
								<!--begin::Tab Pane-->
								<div class="tab-pane fade" id="kt_upgrade_plan_advanced">
									<!--begin::Heading-->
									<div class="pb-5">
										<h2 class="fw-bold text-gray-900">What’s in Startup Plan?</h2>
										<div class="text-muted fw-semibold">Optimal for 100+ team size and grown company</div>
									</div>
									<!--end::Heading-->
									<!--begin::Body-->
									<div class="pt-1">
										<!--begin::Item-->
										<div class="d-flex align-items-center mb-7">
											<span class="fw-semibold fs-5 text-gray-700 flex-grow-1">Up to 10 Active Users</span>
											<i class="ki-outline ki-check-circle fs-1 text-success"></i>
										</div>
										<!--end::Item-->
										<!--begin::Item-->
										<div class="d-flex align-items-center mb-7">
											<span class="fw-semibold fs-5 text-gray-700 flex-grow-1">Up to 30 Project Integrations</span>
											<i class="ki-outline ki-check-circle fs-1 text-success"></i>
										</div>
										<!--end::Item-->
										<!--begin::Item-->
										<div class="d-flex align-items-center mb-7">
											<span class="fw-semibold fs-5 text-gray-700 flex-grow-1">Analytics Module</span>
											<i class="ki-outline ki-check-circle fs-1 text-success"></i>
										</div>
										<!--end::Item-->
										<!--begin::Item-->
										<div class="d-flex align-items-center mb-7">
											<span class="fw-semibold fs-5 text-gray-700 flex-grow-1">Finance Module</span>
											<i class="ki-outline ki-check-circle fs-1 text-success"></i>
										</div>
										<!--end::Item-->
										<!--begin::Item-->
										<div class="d-flex align-items-center mb-7">
											<span class="fw-semibold fs-5 text-gray-700 flex-grow-1">Accounting Module</span>
											<i class="ki-outline ki-check-circle fs-1 text-success"></i>
										</div>
										<!--end::Item-->
										<!--begin::Item-->
										<div class="d-flex align-items-center mb-7">
											<span class="fw-semibold fs-5 text-muted flex-grow-1">Network Platform</span>
											<i class="ki-outline ki-cross-circle fs-1"></i>
										</div>
										<!--end::Item-->
										<!--begin::Item-->
										<div class="d-flex align-items-center">
											<span class="fw-semibold fs-5 text-muted flex-grow-1">Unlimited Cloud Space</span>
											<i class="ki-outline ki-cross-circle fs-1"></i>
										</div>
										<!--end::Item-->
									</div>
									<!--end::Body-->
								</div>
								<!--end::Tab Pane-->
								<!--begin::Tab Pane-->
								<div class="tab-pane fade" id="kt_upgrade_plan_enterprise">
									<!--begin::Heading-->
									<div class="pb-5">
										<h2 class="fw-bold text-gray-900">What’s in Startup Plan?</h2>
										<div class="text-muted fw-semibold">Optimal for 1000+ team and enterpise</div>
									</div>
									<!--end::Heading-->
									<!--begin::Body-->
									<div class="pt-1">
										<!--begin::Item-->
										<div class="d-flex align-items-center mb-7">
											<span class="fw-semibold fs-5 text-gray-700 flex-grow-1">Up to 10 Active Users</span>
											<i class="ki-outline ki-check-circle fs-1 text-success"></i>
										</div>
										<!--end::Item-->
										<!--begin::Item-->
										<div class="d-flex align-items-center mb-7">
											<span class="fw-semibold fs-5 text-gray-700 flex-grow-1">Up to 30 Project Integrations</span>
											<i class="ki-outline ki-check-circle fs-1 text-success"></i>
										</div>
										<!--end::Item-->
										<!--begin::Item-->
										<div class="d-flex align-items-center mb-7">
											<span class="fw-semibold fs-5 text-gray-700 flex-grow-1">Analytics Module</span>
											<i class="ki-outline ki-check-circle fs-1 text-success"></i>
										</div>
										<!--end::Item-->
										<!--begin::Item-->
										<div class="d-flex align-items-center mb-7">
											<span class="fw-semibold fs-5 text-gray-700 flex-grow-1">Finance Module</span>
											<i class="ki-outline ki-check-circle fs-1 text-success"></i>
										</div>
										<!--end::Item-->
										<!--begin::Item-->
										<div class="d-flex align-items-center mb-7">
											<span class="fw-semibold fs-5 text-gray-700 flex-grow-1">Accounting Module</span>
											<i class="ki-outline ki-check-circle fs-1 text-success"></i>
										</div>
										<!--end::Item-->
										<!--begin::Item-->
										<div class="d-flex align-items-center mb-7">
											<span class="fw-semibold fs-5 text-gray-700 flex-grow-1">Network Platform</span>
											<i class="ki-outline ki-check-circle fs-1 text-success"></i>
										</div>
										<!--end::Item-->
										<!--begin::Item-->
										<div class="d-flex align-items-center">
											<span class="fw-semibold fs-5 text-gray-700 flex-grow-1">Unlimited Cloud Space</span>
											<i class="ki-outline ki-check-circle fs-1 text-success"></i>
										</div>
										<!--end::Item-->
									</div>
									<!--end::Body-->
								</div>
								<!--end::Tab Pane-->
								<!--begin::Tab Pane-->
								<div class="tab-pane fade" id="kt_upgrade_plan_custom">
									<!--begin::Heading-->
									<div class="pb-5">
										<h2 class="fw-bold text-gray-900">What’s in Startup Plan?</h2>
										<div class="text-muted fw-semibold">Optimal for corporations</div>
									</div>
									<!--end::Heading-->
									<!--begin::Body-->
									<div class="pt-1">
										<!--begin::Item-->
										<div class="d-flex align-items-center mb-7">
											<span class="fw-semibold fs-5 text-gray-700 flex-grow-1">Unlimited Users</span>
											<i class="ki-outline ki-check-circle fs-1 text-success"></i>
										</div>
										<!--end::Item-->
										<!--begin::Item-->
										<div class="d-flex align-items-center mb-7">
											<span class="fw-semibold fs-5 text-gray-700 flex-grow-1">Unlimited Project Integrations</span>
											<i class="ki-outline ki-check-circle fs-1 text-success"></i>
										</div>
										<!--end::Item-->
										<!--begin::Item-->
										<div class="d-flex align-items-center mb-7">
											<span class="fw-semibold fs-5 text-gray-700 flex-grow-1">Analytics Module</span>
											<i class="ki-outline ki-check-circle fs-1 text-success"></i>
										</div>
										<!--end::Item-->
										<!--begin::Item-->
										<div class="d-flex align-items-center mb-7">
											<span class="fw-semibold fs-5 text-gray-700 flex-grow-1">Finance Module</span>
											<i class="ki-outline ki-check-circle fs-1 text-success"></i>
										</div>
										<!--end::Item-->
										<!--begin::Item-->
										<div class="d-flex align-items-center mb-7">
											<span class="fw-semibold fs-5 text-gray-700 flex-grow-1">Accounting Module</span>
											<i class="ki-outline ki-check-circle fs-1 text-success"></i>
										</div>
										<!--end::Item-->
										<!--begin::Item-->
										<div class="d-flex align-items-center mb-7">
											<span class="fw-semibold fs-5 text-gray-700 flex-grow-1">Network Platform</span>
											<i class="ki-outline ki-check-circle fs-1 text-success"></i>
										</div>
										<!--end::Item-->
										<!--begin::Item-->
										<div class="d-flex align-items-center">
											<span class="fw-semibold fs-5 text-gray-700 flex-grow-1">Unlimited Cloud Space</span>
											<i class="ki-outline ki-check-circle fs-1 text-success"></i>
										</div>
										<!--end::Item-->
									</div>
									<!--end::Body-->
								</div>
								<!--end::Tab Pane-->
							</div>
							<!--end::Tab content-->
						</div>
						<!--end::Col-->
					</div>
					<!--end::Row-->
				</div>
				<!--end::Plans-->
				<!--begin::Actions-->
				<div class="d-flex flex-center flex-row-fluid pt-12">
					<button type="reset" class="btn btn-light me-3" data-bs-dismiss="modal">Cancel</button>
					<button type="submit" class="btn btn-primary" id="kt_modal_upgrade_plan_btn">
						<!--begin::Indicator label-->
						<span class="indicator-label">Upgrade Plan</span>
						<!--end::Indicator label-->
						<!--begin::Indicator progress-->
						<span class="indicator-progress">Please wait... 
						<span class="spinner-border spinner-border-sm align-middle ms-2"></span></span>
						<!--end::Indicator progress-->
					</button>
				</div>
				<!--end::Actions-->
			</div>
			<!--end::Modal body-->
		</div>
		<!--end::Modal content-->
	</div>
	<!--end::Modal dialog-->
</div>

@endsection
								