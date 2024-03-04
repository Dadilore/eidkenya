<!--begin::Header-->
<div id="kt_app_header" class="app-header shadow" data-kt-sticky="true" data-kt-sticky-activate="{default: true, lg: true}" data-kt-sticky-name="app-header-minimize" data-kt-sticky-offset="{default: '200px', lg: '300px'}" data-kt-sticky-animation="false" >
<!--begin::Header container-->
<div class="app-container container-xxl d-flex align-items-stretch flex-stack" id="kt_app_header_container">
	<!--begin::Header mobile-->
	<div class="d-flex align-items-center d-lg-none">
		<!--begin::Sidebar toggle-->
		<button id="kt_app_sidebar_mobile_toggle" class="btn btn-icon btn-color-gray-500 btn-active-color-primary ms-n4 me-1">
			<i class="ki-outline ki-burger-menu-6 fs-2x"></i>
		</button>
		<!--end::Sidebar toggle-->
		<!--begin::Logo-->
		<div class="d-flex align-items-center flex-grow-1 flex-lg-grow-0 me-lg-15">
			<a href="{{ route ('home') }}">
				<img alt="Logo" src="{{ asset('assets/images/logo/logo_t.png') }}" class="h-30px" />
			</a>
		</div>
		<!--end::Logo-->
		<!--begin::Header mobile toggle-->
		<div class="d-flex align-items-center d-lg-none ms-2" title="Show sidebar menu">
			<div class="btn btn-icon btn-color-white bg-white bg-opacity-0 bg-hover-opacity-10 w-35px h-35px" id="kt_app_sidebar_mobile_toggle">
				<i class="ki-outline ki-abstract-14 fs-2"></i>
			</div>
		</div>
		<!--end::Header mobile toggle-->
	</div>
	<!--end::Header mobile-->
	<!--begin::Navbar wrapper-->
	<div class="d-flex flex-stack justify-content-end flex-row-fluid" id="kt_app_navbar_wrapper">
		<div class="page-entry d-flex flex-column flex-row-fluid" data-kt-swapper="true" data-kt-swapper-mode="{default: 'prepend', lg: 'prepend'}" data-kt-swapper-parent="{default: '#kt_app_toolbar_container', lg: '#kt_app_navbar_wrapper'}">
			<!--begin::Breadcrumb-->
			<ul class="breadcrumb breadcrumb-separatorless fw-semibold fs-base my-1">
				<!--begin::Item-->
				<li class="breadcrumb-item text-gray-500">
					<a href="{{ route ('dashboard') }}" class="text-gray-500 text-hover-primary">Dashboard</a>
				</li>
			</ul>
			<!--end::Breadcrumb-->
			<!--begin::Page title-->
			<div class="page-title d-flex align-items-center">
				<!--begin::Title-->
				<h1 class="page-heading d-flex text-gray-900 fw-bolder fs-2x flex-column justify-content-center my-0">User Dashboard</h1>
				<!--end::Title-->
			</div>
			<!--end::Page title-->
		</div>
		<!--begin::Navbar-->
		<div class="app-navbar flex-shrink-0">
			<!--begin::Search-->
			<div class="d-flex align-items-center align-items-stretch">
				<!--begin::Search-->
				<div id="kt_header_search" class="header-search d-flex align-items-center w-100 w-lg-250px" data-kt-search-keypress="true" data-kt-search-min-length="2" data-kt-search-enter="enter" data-kt-search-layout="menu" data-kt-search-responsive="lg" data-kt-menu-trigger="auto" data-kt-menu-permanent="true" data-kt-menu-placement="bottom-end">
					<!--begin::Tablet and mobile search toggle-->
					<div data-kt-search-element="toggle" class="search-toggle-mobile d-flex d-lg-none align-items-center">
						<div class="d-flex btn btn-icon btn-icon-gray-500 btn-active-light btn-active-color-primary w-35px h-35px w-lg-40px h-lg-40px">
							<i class="ki-outline ki-magnifier fs-1"></i>
						</div>
					</div>
					<!--end::Tablet and mobile search toggle-->
					<!--begin::Form(use d-none d-lg-block classes for responsive search)-->
					<form data-kt-search-element="form" class="d-none d-lg-block w-100 position-relative mb-5 mb-lg-0" autocomplete="off">
						<!--begin::Hidden input(Added to disable form autocomplete)-->
						<input type="hidden" />
						<!--end::Hidden input-->
						<!--begin::Icon-->
						<i class="ki-outline ki-magnifier search-icon fs-2 text-gray-500 position-absolute top-50 translate-middle-y ms-5"></i>
						<!--end::Icon-->
						<!--begin::Input-->
						<input type="text" class="search-input form-control ps-13" name="search" value="" placeholder="Search..." data-kt-search-element="input" />
						<!--end::Input-->
						<!--begin::Spinner-->
						<span class="search-spinner position-absolute top-50 end-0 translate-middle-y lh-0 d-none me-5" data-kt-search-element="spinner">
							<span class="spinner-border h-15px w-15px align-middle text-gray-500"></span>
						</span>
						<!--end::Spinner-->
						<!--begin::Reset-->
						<span class="search-reset btn btn-flush btn-active-color-primary position-absolute top-50 end-0 translate-middle-y lh-0 d-none me-4" data-kt-search-element="clear">
							<i class="ki-outline ki-cross fs-2 fs-lg-1 me-0"></i>
						</span>
						<!--end::Reset-->
					</form>
					<!--end::Form-->
					<!--begin::Menu-->
					<div data-kt-search-element="content" class="menu menu-sub menu-sub-dropdown py-7 px-7 overflow-hidden w-300px w-md-350px">
						<!--begin::Wrapper-->
						<div data-kt-search-element="wrapper">
							<!--begin::Recently viewed-->
							<div data-kt-search-element="results" class="d-none">
								<!--begin::Items-->
								<div class="scroll-y mh-200px mh-lg-350px">
									<!--begin::Category title-->
									<h3 class="fs-5 text-muted m-0 pb-5" data-kt-search-element="category-title">Users</h3>
									<!--end::Category title-->
									<!--begin::Item-->
									<a href="#" class="d-flex text-gray-900 text-hover-primary align-items-center mb-5">
										<!--begin::Symbol-->
										<div class="symbol symbol-40px me-4">
											<img src="{{ asset('user/media/avatars/300-6.jpg') }}" alt="" />
										</div>
										<!--end::Symbol-->
										<!--begin::Title-->
										<div class="d-flex flex-column justify-content-start fw-semibold">
											<span class="fs-6 fw-semibold">Karina Clark</span>
											<span class="fs-7 fw-semibold text-muted">Marketing Manager</span>
										</div>
										<!--end::Title-->
									</a>
									<!--end::Item-->
									<!--begin::Item-->
									<a href="#" class="d-flex text-gray-900 text-hover-primary align-items-center mb-5">
										<!--begin::Symbol-->
										<div class="symbol symbol-40px me-4">
											<img src="{{ asset('user/media/avatars/300-2.jpg') }}" alt="" />
										</div>
										<!--end::Symbol-->
										<!--begin::Title-->
										<div class="d-flex flex-column justify-content-start fw-semibold">
											<span class="fs-6 fw-semibold">Olivia Bold</span>
											<span class="fs-7 fw-semibold text-muted">Software Engineer</span>
										</div>
										<!--end::Title-->
									</a>
									<!--end::Item-->
									<!--begin::Item-->
									<a href="#" class="d-flex text-gray-900 text-hover-primary align-items-center mb-5">
										<!--begin::Symbol-->
										<div class="symbol symbol-40px me-4">
											<img src="{{ asset('user/media/avatars/300-9.jpg') }}" alt="" />
										</div>
										<!--end::Symbol-->
										<!--begin::Title-->
										<div class="d-flex flex-column justify-content-start fw-semibold">
											<span class="fs-6 fw-semibold">Ana Clark</span>
											<span class="fs-7 fw-semibold text-muted">UI/UX Designer</span>
										</div>
										<!--end::Title-->
									</a>
									<!--end::Item-->
									<!--begin::Item-->
									<a href="#" class="d-flex text-gray-900 text-hover-primary align-items-center mb-5">
										<!--begin::Symbol-->
										<div class="symbol symbol-40px me-4">
											<img src="{{ asset('user/media/avatars/300-14.jpg') }}" alt="" />
										</div>
										<!--end::Symbol-->
										<!--begin::Title-->
										<div class="d-flex flex-column justify-content-start fw-semibold">
											<span class="fs-6 fw-semibold">Nick Pitola</span>
											<span class="fs-7 fw-semibold text-muted">Art Director</span>
										</div>
										<!--end::Title-->
									</a>
									<!--end::Item-->
									<!--begin::Item-->
									<a href="#" class="d-flex text-gray-900 text-hover-primary align-items-center mb-5">
										<!--begin::Symbol-->
										<div class="symbol symbol-40px me-4">
											<img src="{{ asset('user/media/avatars/300-11.jpg') }}" alt="" />
										</div>
										<!--end::Symbol-->
										<!--begin::Title-->
										<div class="d-flex flex-column justify-content-start fw-semibold">
											<span class="fs-6 fw-semibold">Edward Kulnic</span>
											<span class="fs-7 fw-semibold text-muted">System Administrator</span>
										</div>
										<!--end::Title-->
									</a>
									<!--end::Item-->
									<!--begin::Category title-->
									<h3 class="fs-5 text-muted m-0 pt-5 pb-5" data-kt-search-element="category-title">Customers</h3>
									<!--end::Category title-->
									<!--begin::Item-->
									<a href="#" class="d-flex text-gray-900 text-hover-primary align-items-center mb-5">
										<!--begin::Symbol-->
										<div class="symbol symbol-40px me-4">
											<span class="symbol-label bg-light">
												<img class="w-20px h-20px" src="{{ asset('user/media/svg/brand-logos/volicity-9.svg') }}" alt="" />
											</span>
										</div>
										<!--end::Symbol-->
										<!--begin::Title-->
										<div class="d-flex flex-column justify-content-start fw-semibold">
											<span class="fs-6 fw-semibold">Company Rbranding</span>
											<span class="fs-7 fw-semibold text-muted">UI Design</span>
										</div>
										<!--end::Title-->
									</a>
									<!--end::Item-->
									<!--begin::Item-->
									<a href="#" class="d-flex text-gray-900 text-hover-primary align-items-center mb-5">
										<!--begin::Symbol-->
										<div class="symbol symbol-40px me-4">
											<span class="symbol-label bg-light">
												<img class="w-20px h-20px" src="{{ asset('user/media/svg/brand-logos/tvit.svg') }}" alt="" />
											</span>
										</div>
										<!--end::Symbol-->
										<!--begin::Title-->
										<div class="d-flex flex-column justify-content-start fw-semibold">
											<span class="fs-6 fw-semibold">Company Re-branding</span>
											<span class="fs-7 fw-semibold text-muted">Web Development</span>
										</div>
										<!--end::Title-->
									</a>
									<!--end::Item-->
									<!--begin::Item-->
									<a href="#" class="d-flex text-gray-900 text-hover-primary align-items-center mb-5">
										<!--begin::Symbol-->
										<div class="symbol symbol-40px me-4">
											<span class="symbol-label bg-light">
												<img class="w-20px h-20px" src="{{ asset('user/media/svg/misc/infography.svg') }}" alt="" />
											</span>
										</div>
										<!--end::Symbol-->
										<!--begin::Title-->
										<div class="d-flex flex-column justify-content-start fw-semibold">
											<span class="fs-6 fw-semibold">Business Analytics App</span>
											<span class="fs-7 fw-semibold text-muted">Administration</span>
										</div>
										<!--end::Title-->
									</a>
									<!--end::Item-->
									<!--begin::Item-->
									<a href="#" class="d-flex text-gray-900 text-hover-primary align-items-center mb-5">
										<!--begin::Symbol-->
										<div class="symbol symbol-40px me-4">
											<span class="symbol-label bg-light">
												<img class="w-20px h-20px" src="{{ asset('user/media/svg/brand-logos/leaf.svg') }}" alt="" />
											</span>
										</div>
										<!--end::Symbol-->
										<!--begin::Title-->
										<div class="d-flex flex-column justify-content-start fw-semibold">
											<span class="fs-6 fw-semibold">EcoLeaf App Launch</span>
											<span class="fs-7 fw-semibold text-muted">Marketing</span>
										</div>
										<!--end::Title-->
									</a>
									<!--end::Item-->
									<!--begin::Item-->
									<a href="#" class="d-flex text-gray-900 text-hover-primary align-items-center mb-5">
										<!--begin::Symbol-->
										<div class="symbol symbol-40px me-4">
											<span class="symbol-label bg-light">
												<img class="w-20px h-20px" src="{{ asset('user/media/svg/brand-logos/tower.svg') }}" alt="" />
											</span>
										</div>
										<!--end::Symbol-->
										<!--begin::Title-->
										<div class="d-flex flex-column justify-content-start fw-semibold">
											<span class="fs-6 fw-semibold">Tower Group Website</span>
											<span class="fs-7 fw-semibold text-muted">Google Adwords</span>
										</div>
										<!--end::Title-->
									</a>
									<!--end::Item-->
									<!--begin::Category title-->
									<h3 class="fs-5 text-muted m-0 pt-5 pb-5" data-kt-search-element="category-title">Projects</h3>
									<!--end::Category title-->
									<!--begin::Item-->
									<a href="#" class="d-flex text-gray-900 text-hover-primary align-items-center mb-5">
										<!--begin::Symbol-->
										<div class="symbol symbol-40px me-4">
											<span class="symbol-label bg-light">
												<i class="ki-outline ki-notepad fs-2 text-primary"></i>
											</span>
										</div>
										<!--end::Symbol-->
										<!--begin::Title-->
										<div class="d-flex flex-column">
											<span class="fs-6 fw-semibold">Si-Fi Project by AU Themes</span>
											<span class="fs-7 fw-semibold text-muted">#45670</span>
										</div>
										<!--end::Title-->
									</a>
									<!--end::Item-->
									<!--begin::Item-->
									<a href="#" class="d-flex text-gray-900 text-hover-primary align-items-center mb-5">
										<!--begin::Symbol-->
										<div class="symbol symbol-40px me-4">
											<span class="symbol-label bg-light">
												<i class="ki-outline ki-frame fs-2 text-primary"></i>
											</span>
										</div>
										<!--end::Symbol-->
										<!--begin::Title-->
										<div class="d-flex flex-column">
											<span class="fs-6 fw-semibold">Shopix Mobile App Planning</span>
											<span class="fs-7 fw-semibold text-muted">#45690</span>
										</div>
										<!--end::Title-->
									</a>
									<!--end::Item-->
									<!--begin::Item-->
									<a href="#" class="d-flex text-gray-900 text-hover-primary align-items-center mb-5">
										<!--begin::Symbol-->
										<div class="symbol symbol-40px me-4">
											<span class="symbol-label bg-light">
												<i class="ki-outline ki-message-text-2 fs-2 text-primary"></i>
											</span>
										</div>
										<!--end::Symbol-->
										<!--begin::Title-->
										<div class="d-flex flex-column">
											<span class="fs-6 fw-semibold">Finance Monitoring SAAS Discussion</span>
											<span class="fs-7 fw-semibold text-muted">#21090</span>
										</div>
										<!--end::Title-->
									</a>
									<!--end::Item-->
									<!--begin::Item-->
									<a href="#" class="d-flex text-gray-900 text-hover-primary align-items-center mb-5">
										<!--begin::Symbol-->
										<div class="symbol symbol-40px me-4">
											<span class="symbol-label bg-light">
												<i class="ki-outline ki-profile-circle fs-2 text-primary"></i>
											</span>
										</div>
										<!--end::Symbol-->
										<!--begin::Title-->
										<div class="d-flex flex-column">
											<span class="fs-6 fw-semibold">Dashboard Analitics Launch</span>
											<span class="fs-7 fw-semibold text-muted">#34560</span>
										</div>
										<!--end::Title-->
									</a>
									<!--end::Item-->
								</div>
								<!--end::Items-->
							</div>
							<!--end::Recently viewed-->
							<!--begin::Recently viewed-->
							<div class="" data-kt-search-element="main">
								<!--begin::Heading-->
								<div class="d-flex flex-stack fw-semibold mb-4">
									<!--begin::Label-->
									<span class="text-muted fs-6 me-2">Recently Searched:</span>
									<!--end::Label-->
									<!--begin::Toolbar-->
									<div class="d-flex" data-kt-search-element="toolbar">
										<!--begin::Preferences toggle-->
										<div data-kt-search-element="preferences-show" class="btn btn-icon w-20px btn-sm btn-active-color-primary me-2 data-bs-toggle=" title="Show search preferences">
											<i class="ki-outline ki-setting-2 fs-2"></i>
										</div>
										<!--end::Preferences toggle-->
										<!--begin::Advanced search toggle-->
										<div data-kt-search-element="advanced-options-form-show" class="btn btn-icon w-20px btn-sm btn-active-color-primary me-n1" data-bs-toggle="tooltip" title="Show more search options">
											<i class="ki-outline ki-down fs-2"></i>
										</div>
										<!--end::Advanced search toggle-->
									</div>
									<!--end::Toolbar-->
								</div>
								<!--end::Heading-->
								<!--begin::Items-->
								<div class="scroll-y mh-200px mh-lg-325px">
									<!--begin::Item-->
									<div class="d-flex align-items-center mb-5">
										<!--begin::Symbol-->
										<div class="symbol symbol-40px me-4">
											<span class="symbol-label bg-light">
												<i class="ki-outline ki-laptop fs-2 text-primary"></i>
											</span>
										</div>
										<!--end::Symbol-->
										<!--begin::Title-->
										<div class="d-flex flex-column">
											<a href="#" class="fs-6 text-gray-800 text-hover-primary fw-semibold">BoomApp by Keenthemes</a>
											<span class="fs-7 text-muted fw-semibold">#45789</span>
										</div>
										<!--end::Title-->
									</div>
									<!--end::Item-->
									<!--begin::Item-->
									<div class="d-flex align-items-center mb-5">
										<!--begin::Symbol-->
										<div class="symbol symbol-40px me-4">
											<span class="symbol-label bg-light">
												<i class="ki-outline ki-chart-simple fs-2 text-primary"></i>
											</span>
										</div>
										<!--end::Symbol-->
										<!--begin::Title-->
										<div class="d-flex flex-column">
											<a href="#" class="fs-6 text-gray-800 text-hover-primary fw-semibold">"Kept API Project Meeting</a>
											<span class="fs-7 text-muted fw-semibold">#84050</span>
										</div>
										<!--end::Title-->
									</div>
									<!--end::Item-->
									<!--begin::Item-->
									<div class="d-flex align-items-center mb-5">
										<!--begin::Symbol-->
										<div class="symbol symbol-40px me-4">
											<span class="symbol-label bg-light">
												<i class="ki-outline ki-chart fs-2 text-primary"></i>
											</span>
										</div>
										<!--end::Symbol-->
										<!--begin::Title-->
										<div class="d-flex flex-column">
											<a href="#" class="fs-6 text-gray-800 text-hover-primary fw-semibold">"KPI Monitoring App Launch</a>
											<span class="fs-7 text-muted fw-semibold">#84250</span>
										</div>
										<!--end::Title-->
									</div>
									<!--end::Item-->
									<!--begin::Item-->
									<div class="d-flex align-items-center mb-5">
										<!--begin::Symbol-->
										<div class="symbol symbol-40px me-4">
											<span class="symbol-label bg-light">
												<i class="ki-outline ki-chart-line-down fs-2 text-primary"></i>
											</span>
										</div>
										<!--end::Symbol-->
										<!--begin::Title-->
										<div class="d-flex flex-column">
											<a href="#" class="fs-6 text-gray-800 text-hover-primary fw-semibold">Project Reference FAQ</a>
											<span class="fs-7 text-muted fw-semibold">#67945</span>
										</div>
										<!--end::Title-->
									</div>
									<!--end::Item-->
									<!--begin::Item-->
									<div class="d-flex align-items-center mb-5">
										<!--begin::Symbol-->
										<div class="symbol symbol-40px me-4">
											<span class="symbol-label bg-light">
												<i class="ki-outline ki-sms fs-2 text-primary"></i>
											</span>
										</div>
										<!--end::Symbol-->
										<!--begin::Title-->
										<div class="d-flex flex-column">
											<a href="#" class="fs-6 text-gray-800 text-hover-primary fw-semibold">"FitPro App Development</a>
											<span class="fs-7 text-muted fw-semibold">#84250</span>
										</div>
										<!--end::Title-->
									</div>
									<!--end::Item-->
									<!--begin::Item-->
									<div class="d-flex align-items-center mb-5">
										<!--begin::Symbol-->
										<div class="symbol symbol-40px me-4">
											<span class="symbol-label bg-light">
												<i class="ki-outline ki-bank fs-2 text-primary"></i>
											</span>
										</div>
										<!--end::Symbol-->
										<!--begin::Title-->
										<div class="d-flex flex-column">
											<a href="#" class="fs-6 text-gray-800 text-hover-primary fw-semibold">Shopix Mobile App</a>
											<span class="fs-7 text-muted fw-semibold">#45690</span>
										</div>
										<!--end::Title-->
									</div>
									<!--end::Item-->
									<!--begin::Item-->
									<div class="d-flex align-items-center mb-5">
										<!--begin::Symbol-->
										<div class="symbol symbol-40px me-4">
											<span class="symbol-label bg-light">
												<i class="ki-outline ki-chart-line-down fs-2 text-primary"></i>
											</span>
										</div>
										<!--end::Symbol-->
										<!--begin::Title-->
										<div class="d-flex flex-column">
											<a href="#" class="fs-6 text-gray-800 text-hover-primary fw-semibold">"Landing UI Design" Launch</a>
											<span class="fs-7 text-muted fw-semibold">#24005</span>
										</div>
										<!--end::Title-->
									</div>
									<!--end::Item-->
								</div>
								<!--end::Items-->
							</div>
							<!--end::Recently viewed-->
							<!--begin::Empty-->
							<div data-kt-search-element="empty" class="text-center d-none">
								<!--begin::Icon-->
								<div class="pt-10 pb-10">
									<i class="ki-outline ki-search-list fs-4x opacity-50"></i>
								</div>
								<!--end::Icon-->
								<!--begin::Message-->
								<div class="pb-15 fw-semibold">
									<h3 class="text-gray-600 fs-5 mb-2">No result found</h3>
									<div class="text-muted fs-7">Please try again with a different query</div>
								</div>
								<!--end::Message-->
							</div>
							<!--end::Empty-->
						</div>
						<!--end::Wrapper-->
						<!--begin::Preferences-->
						<form data-kt-search-element="advanced-options-form" class="pt-1 d-none">
							<!--begin::Heading-->
							<h3 class="fw-semibold text-gray-900 mb-7">Advanced Search</h3>
							<!--end::Heading-->
							<!--begin::Input group-->
							<div class="mb-5">
								<input type="text" class="form-control form-control-sm form-control-solid" placeholder="Contains the word" name="query" />
							</div>
							<!--end::Input group-->
							<!--begin::Input group-->
							<div class="mb-5">
								<!--begin::Radio group-->
								<div class="nav-group nav-group-fluid">
									<!--begin::Option-->
									<label>
										<input type="radio" class="btn-check" name="type" value="has" checked="checked" />
										<span class="btn btn-sm btn-color-muted btn-active btn-active-primary">All</span>
									</label>
									<!--end::Option-->
									<!--begin::Option-->
									<label>
										<input type="radio" class="btn-check" name="type" value="users" />
										<span class="btn btn-sm btn-color-muted btn-active btn-active-primary px-4">Users</span>
									</label>
									<!--end::Option-->
									<!--begin::Option-->
									<label>
										<input type="radio" class="btn-check" name="type" value="orders" />
										<span class="btn btn-sm btn-color-muted btn-active btn-active-primary px-4">Orders</span>
									</label>
									<!--end::Option-->
									<!--begin::Option-->
									<label>
										<input type="radio" class="btn-check" name="type" value="projects" />
										<span class="btn btn-sm btn-color-muted btn-active btn-active-primary px-4">Projects</span>
									</label>
									<!--end::Option-->
								</div>
								<!--end::Radio group-->
							</div>
							<!--end::Input group-->
							<!--begin::Input group-->
							<div class="mb-5">
								<input type="text" name="assignedto" class="form-control form-control-sm form-control-solid" placeholder="Assigned to" value="" />
							</div>
							<!--end::Input group-->
							<!--begin::Input group-->
							<div class="mb-5">
								<input type="text" name="collaborators" class="form-control form-control-sm form-control-solid" placeholder="Collaborators" value="" />
							</div>
							<!--end::Input group-->
							<!--begin::Input group-->
							<div class="mb-5">
								<!--begin::Radio group-->
								<div class="nav-group nav-group-fluid">
									<!--begin::Option-->
									<label>
										<input type="radio" class="btn-check" name="attachment" value="has" checked="checked" />
										<span class="btn btn-sm btn-color-muted btn-active btn-active-primary">Has attachment</span>
									</label>
									<!--end::Option-->
									<!--begin::Option-->
									<label>
										<input type="radio" class="btn-check" name="attachment" value="any" />
										<span class="btn btn-sm btn-color-muted btn-active btn-active-primary px-4">Any</span>
									</label>
									<!--end::Option-->
								</div>
								<!--end::Radio group-->
							</div>
							<!--end::Input group-->
							<!--begin::Input group-->
							<div class="mb-5">
								<select name="timezone" aria-label="Select a Timezone" data-control="select2" data-dropdown-parent="#kt_header_search" data-placeholder="date_period" class="form-select form-select-sm form-select-solid">
									<option value="next">Within the next</option>
									<option value="last">Within the last</option>
									<option value="between">Between</option>
									<option value="on">On</option>
								</select>
							</div>
							<!--end::Input group-->
							<!--begin::Input group-->
							<div class="row mb-8">
								<!--begin::Col-->
								<div class="col-6">
									<input type="number" name="date_number" class="form-control form-control-sm form-control-solid" placeholder="Lenght" value="" />
								</div>
								<!--end::Col-->
								<!--begin::Col-->
								<div class="col-6">
									<select name="date_typer" aria-label="Select a Timezone" data-control="select2" data-dropdown-parent="#kt_header_search" data-placeholder="Period" class="form-select form-select-sm form-select-solid">
										<option value="days">Days</option>
										<option value="weeks">Weeks</option>
										<option value="months">Months</option>
										<option value="years">Years</option>
									</select>
								</div>
								<!--end::Col-->
							</div>
							<!--end::Input group-->
							<!--begin::Actions-->
							<div class="d-flex justify-content-end">
								<button type="reset" class="btn btn-sm btn-light fw-bold btn-active-light-primary me-2" data-kt-search-element="advanced-options-form-cancel">Cancel</button>
								<a href="utilities/search/horizontal.html" class="btn btn-sm fw-bold btn-primary" data-kt-search-element="advanced-options-form-search">Search</a>
							</div>
							<!--end::Actions-->
						</form>
						<!--end::Preferences-->
						<!--begin::Preferences-->
						<form data-kt-search-element="preferences" class="pt-1 d-none">
							<!--begin::Heading-->
							<h3 class="fw-semibold text-gray-900 mb-7">Search Preferences</h3>
							<!--end::Heading-->
							<!--begin::Input group-->
							<div class="pb-4 border-bottom">
								<label class="form-check form-switch form-switch-sm form-check-custom form-check-solid flex-stack">
									<span class="form-check-label text-gray-700 fs-6 fw-semibold ms-0 me-2">Projects</span>
									<input class="form-check-input" type="checkbox" value="1" checked="checked" />
								</label>
							</div>
							<!--end::Input group-->
							<!--begin::Input group-->
							<div class="py-4 border-bottom">
								<label class="form-check form-switch form-switch-sm form-check-custom form-check-solid flex-stack">
									<span class="form-check-label text-gray-700 fs-6 fw-semibold ms-0 me-2">Targets</span>
									<input class="form-check-input" type="checkbox" value="1" checked="checked" />
								</label>
							</div>
							<!--end::Input group-->
							<!--begin::Input group-->
							<div class="py-4 border-bottom">
								<label class="form-check form-switch form-switch-sm form-check-custom form-check-solid flex-stack">
									<span class="form-check-label text-gray-700 fs-6 fw-semibold ms-0 me-2">Affiliate Programs</span>
									<input class="form-check-input" type="checkbox" value="1" />
								</label>
							</div>
							<!--end::Input group-->
							<!--begin::Input group-->
							<div class="py-4 border-bottom">
								<label class="form-check form-switch form-switch-sm form-check-custom form-check-solid flex-stack">
									<span class="form-check-label text-gray-700 fs-6 fw-semibold ms-0 me-2">Referrals</span>
									<input class="form-check-input" type="checkbox" value="1" checked="checked" />
								</label>
							</div>
							<!--end::Input group-->
							<!--begin::Input group-->
							<div class="py-4 border-bottom">
								<label class="form-check form-switch form-switch-sm form-check-custom form-check-solid flex-stack">
									<span class="form-check-label text-gray-700 fs-6 fw-semibold ms-0 me-2">Users</span>
									<input class="form-check-input" type="checkbox" value="1" />
								</label>
							</div>
							<!--end::Input group-->
							<!--begin::Actions-->
							<div class="d-flex justify-content-end pt-7">
								<button type="reset" class="btn btn-sm btn-light fw-bold btn-active-light-primary me-2" data-kt-search-element="preferences-dismiss">Cancel</button>
								<button type="submit" class="btn btn-sm fw-bold btn-primary">Save Changes</button>
							</div>
							<!--end::Actions-->
						</form>
						<!--end::Preferences-->
					</div>
					<!--end::Menu-->
				</div>
				<!--end::Search-->
			</div>
			<!--end::Search-->
			<!--begin::Quick links-->
			<div class="app-navbar-item ms-2 ms-lg-3">
				<!--begin::Menu wrapper-->
				<div class="btn btn-icon btn-icon-gray-500 btn-active-light btn-active-color-primary w-35px h-35px w-lg-40px h-lg-40px" data-kt-menu-trigger="{default: 'click', lg: 'hover'}" data-kt-menu-attach="parent" data-kt-menu-placement="bottom-end">
					<i class="ki-outline ki-add-notepad fs-1"></i>
				</div>
				<!--begin::Menu-->
				<div class="menu menu-sub menu-sub-dropdown menu-column w-250px w-lg-325px" data-kt-menu="true">
					<!--begin::Heading-->
					<div class="d-flex flex-column flex-center bgi-no-repeat rounded-top px-9 py-10" style="background-image:url('{{ asset('user/media/misc/menu-header-bg.jpg') }}')">
						<!--begin::Title-->
						<h3 class="text-white fw-semibold mb-3">Quick Links</h3>
						<!--end::Title-->
						<!--begin::Status-->
						<span class="badge bg-primary text-inverse-primary py-2 px-3">25 pending tasks</span>
						<!--end::Status-->
					</div>
					<!--end::Heading-->
					<!--begin:Nav-->
					<div class="row g-0">
						<!--begin:Item-->
						<div class="col-6">
							<a href="apps/projects/budget.html" class="d-flex flex-column flex-center h-100 p-6 bg-hover-light border-end border-bottom">
								<i class="ki-outline ki-dollar fs-3x text-primary mb-2"></i>
								<span class="fs-5 fw-semibold text-gray-800 mb-0">Accounting</span>
								<span class="fs-7 text-gray-500">eCommerce</span>
							</a>
						</div>
						<!--end:Item-->
						<!--begin:Item-->
						<div class="col-6">
							<a href="apps/projects/settings.html" class="d-flex flex-column flex-center h-100 p-6 bg-hover-light border-bottom">
								<i class="ki-outline ki-sms fs-3x text-primary mb-2"></i>
								<span class="fs-5 fw-semibold text-gray-800 mb-0">Administration</span>
								<span class="fs-7 text-gray-500">Console</span>
							</a>
						</div>
						<!--end:Item-->
						<!--begin:Item-->
						<div class="col-6">
							<a href="apps/projects/list.html" class="d-flex flex-column flex-center h-100 p-6 bg-hover-light border-end">
								<i class="ki-outline ki-abstract-41 fs-3x text-primary mb-2"></i>
								<span class="fs-5 fw-semibold text-gray-800 mb-0">Projects</span>
								<span class="fs-7 text-gray-500">Pending Tasks</span>
							</a>
						</div>
						<!--end:Item-->
						<!--begin:Item-->
						<div class="col-6">
							<a href="apps/projects/users.html" class="d-flex flex-column flex-center h-100 p-6 bg-hover-light">
								<i class="ki-outline ki-briefcase fs-3x text-primary mb-2"></i>
								<span class="fs-5 fw-semibold text-gray-800 mb-0">Customers</span>
								<span class="fs-7 text-gray-500">Latest cases</span>
							</a>
						</div>
						<!--end:Item-->
					</div>
					<!--end:Nav-->
					<!--begin::View more-->
					<div class="py-2 text-center border-top">
						<a href="pages/user-profile/activity.html" class="btn btn-color-gray-600 btn-active-color-primary">View All 
						<i class="ki-outline ki-arrow-right fs-5"></i></a>
					</div>
					<!--end::View more-->
				</div>
				<!--end::Menu-->
				<!--end::Menu wrapper-->
			</div>
			<!--end::Quick links-->
			<!--begin::My apps-->
			<div class="app-navbar-item ms-2 ms-lg-3">
				<!--begin::Menu- wrapper-->
				<div class="btn btn-icon btn-icon-gray-500 btn-active-light btn-active-color-primary w-35px h-35px w-lg-40px h-lg-40px" data-kt-menu-trigger="{default: 'click', lg: 'hover'}" data-kt-menu-attach="parent" data-kt-menu-placement="bottom-end">
					<i class="ki-outline ki-element-11 fs-1"></i>
				</div>
				<!--begin::My apps-->
				<div class="menu menu-sub menu-sub-dropdown menu-column w-100 w-sm-350px" data-kt-menu="true">
					<!--begin::Card-->
					<div class="card">
						<!--begin::Card header-->
						<div class="card-header">
							<!--begin::Card title-->
							<div class="card-title">My Apps</div>
							<!--end::Card title-->
							<!--begin::Card toolbar-->
							<div class="card-toolbar">
								<!--begin::Menu-->
								<button type="button" class="btn btn-sm btn-icon btn-active-light-primary me-n3" data-kt-menu-trigger="{default: 'click', lg: 'hover'}" data-kt-menu-placement="bottom-end">
									<i class="ki-outline ki-setting-3 fs-2"></i>
								</button>
								<!--begin::Menu 3-->
								<div class="menu menu-sub menu-sub-dropdown menu-column menu-rounded menu-gray-800 menu-state-bg-light-primary fw-semibold w-200px py-3" data-kt-menu="true">
									<!--begin::Heading-->
									<div class="menu-item px-3">
										<div class="menu-content text-muted pb-2 px-3 fs-7 text-uppercase">Payments</div>
									</div>
									<!--end::Heading-->
									<!--begin::Menu item-->
									<div class="menu-item px-3">
										<a href="#" class="menu-link px-3">Create Invoice</a>
									</div>
									<!--end::Menu item-->
									<!--begin::Menu item-->
									<div class="menu-item px-3">
										<a href="#" class="menu-link flex-stack px-3">Create Payment 
										<span class="ms-2" data-bs-toggle="tooltip" title="Specify a target name for future usage and reference">
											<i class="ki-outline ki-information fs-6"></i>
										</span></a>
									</div>
									<!--end::Menu item-->
									<!--begin::Menu item-->
									<div class="menu-item px-3">
										<a href="#" class="menu-link px-3">Generate Bill</a>
									</div>
									<!--end::Menu item-->
									<!--begin::Menu item-->
									<div class="menu-item px-3" data-kt-menu-trigger="hover" data-kt-menu-placement="right-end">
										<a href="#" class="menu-link px-3">
											<span class="menu-title">Subscription</span>
											<span class="menu-arrow"></span>
										</a>
										<!--begin::Menu sub-->
										<div class="menu-sub menu-sub-dropdown w-175px py-4">
											<!--begin::Menu item-->
											<div class="menu-item px-3">
												<a href="#" class="menu-link px-3">Plans</a>
											</div>
											<!--end::Menu item-->
											<!--begin::Menu item-->
											<div class="menu-item px-3">
												<a href="#" class="menu-link px-3">Billing</a>
											</div>
											<!--end::Menu item-->
											<!--begin::Menu item-->
											<div class="menu-item px-3">
												<a href="#" class="menu-link px-3">Statements</a>
											</div>
											<!--end::Menu item-->
											<!--begin::Menu separator-->
											<div class="separator my-2"></div>
											<!--end::Menu separator-->
											<!--begin::Menu item-->
											<div class="menu-item px-3">
												<div class="menu-content px-3">
													<!--begin::Switch-->
													<label class="form-check form-switch form-check-custom form-check-solid">
														<!--begin::Input-->
														<input class="form-check-input w-30px h-20px" type="checkbox" value="1" checked="checked" name="notifications" />
														<!--end::Input-->
														<!--end::Label-->
														<span class="form-check-label text-muted fs-6">Recuring</span>
														<!--end::Label-->
													</label>
													<!--end::Switch-->
												</div>
											</div>
											<!--end::Menu item-->
										</div>
										<!--end::Menu sub-->
									</div>
									<!--end::Menu item-->
									<!--begin::Menu item-->
									<div class="menu-item px-3 my-1">
										<a href="#" class="menu-link px-3">Settings</a>
									</div>
									<!--end::Menu item-->
								</div>
								<!--end::Menu 3-->
								<!--end::Menu-->
							</div>
							<!--end::Card toolbar-->
						</div>
						<!--end::Card header-->
						<!--begin::Card body-->
						<div class="card-body py-5">
							<!--begin::Scroll-->
							<div class="mh-450px scroll-y me-n5 pe-5">
								<!--begin::Row-->
								<div class="row g-2">
									<!--begin::Col-->
									<div class="col-4">
										<a href="#" class="d-flex flex-column flex-center text-center text-gray-800 text-hover-primary bg-hover-light rounded py-4 px-3 mb-3">
											<img src="{{ asset('user/media/svg/brand-logos/amazon.svg') }}" class="w-25px h-25px mb-2" alt="" />
											<span class="fw-semibold">AWS</span>
										</a>
									</div>
									<!--end::Col-->
									<!--begin::Col-->
									<div class="col-4">
										<a href="#" class="d-flex flex-column flex-center text-center text-gray-800 text-hover-primary bg-hover-light rounded py-4 px-3 mb-3">
											<img src="{{ asset('user/media/svg/brand-logos/angular-icon-1.svg') }}" class="w-25px h-25px mb-2" alt="" />
											<span class="fw-semibold">AngularJS</span>
										</a>
									</div>
									<!--end::Col-->
									<!--begin::Col-->
									<div class="col-4">
										<a href="#" class="d-flex flex-column flex-center text-center text-gray-800 text-hover-primary bg-hover-light rounded py-4 px-3 mb-3">
											<img src="{{ asset('user/media/svg/brand-logos/atica.svg') }}" class="w-25px h-25px mb-2" alt="" />
											<span class="fw-semibold">Atica</span>
										</a>
									</div>
									<!--end::Col-->
									<!--begin::Col-->
									<div class="col-4">
										<a href="#" class="d-flex flex-column flex-center text-center text-gray-800 text-hover-primary bg-hover-light rounded py-4 px-3 mb-3">
											<img src="{{ asset('user/media/svg/brand-logos/beats-electronics.svg') }}" class="w-25px h-25px mb-2" alt="" />
											<span class="fw-semibold">Music</span>
										</a>
									</div>
									<!--end::Col-->
									<!--begin::Col-->
									<div class="col-4">
										<a href="#" class="d-flex flex-column flex-center text-center text-gray-800 text-hover-primary bg-hover-light rounded py-4 px-3 mb-3">
											<img src="{{ asset('user/media/svg/brand-logos/codeigniter.svg') }}" class="w-25px h-25px mb-2" alt="" />
											<span class="fw-semibold">Codeigniter</span>
										</a>
									</div>
									<!--end::Col-->
									<!--begin::Col-->
									<div class="col-4">
										<a href="#" class="d-flex flex-column flex-center text-center text-gray-800 text-hover-primary bg-hover-light rounded py-4 px-3 mb-3">
											<img src="{{ asset('user/media/svg/brand-logos/bootstrap-4.svg') }}" class="w-25px h-25px mb-2" alt="" />
											<span class="fw-semibold">Bootstrap</span>
										</a>
									</div>
									<!--end::Col-->
									<!--begin::Col-->
									<div class="col-4">
										<a href="#" class="d-flex flex-column flex-center text-center text-gray-800 text-hover-primary bg-hover-light rounded py-4 px-3 mb-3">
											<img src="{{ asset('user/media/svg/brand-logos/google-tag-manager.svg') }}" class="w-25px h-25px mb-2" alt="" />
											<span class="fw-semibold">GTM</span>
										</a>
									</div>
									<!--end::Col-->
									<!--begin::Col-->
									<div class="col-4">
										<a href="#" class="d-flex flex-column flex-center text-center text-gray-800 text-hover-primary bg-hover-light rounded py-4 px-3 mb-3">
											<img src="{{ asset('user/media/svg/brand-logos/disqus.svg') }}" class="w-25px h-25px mb-2" alt="" />
											<span class="fw-semibold">Disqus</span>
										</a>
									</div>
									<!--end::Col-->
									<!--begin::Col-->
									<div class="col-4">
										<a href="#" class="d-flex flex-column flex-center text-center text-gray-800 text-hover-primary bg-hover-light rounded py-4 px-3 mb-3">
											<img src="{{ asset('user/media/svg/brand-logos/dribbble-icon-1.svg') }}" class="w-25px h-25px mb-2" alt="" />
											<span class="fw-semibold">Dribble</span>
										</a>
									</div>
									<!--end::Col-->
									<!--begin::Col-->
									<div class="col-4">
										<a href="#" class="d-flex flex-column flex-center text-center text-gray-800 text-hover-primary bg-hover-light rounded py-4 px-3 mb-3">
											<img src="{{ asset('user/media/svg/brand-logos/google-play-store.svg') }}" class="w-25px h-25px mb-2" alt="" />
											<span class="fw-semibold">Play Store</span>
										</a>
									</div>
									<!--end::Col-->
									<!--begin::Col-->
									<div class="col-4">
										<a href="#" class="d-flex flex-column flex-center text-center text-gray-800 text-hover-primary bg-hover-light rounded py-4 px-3 mb-3">
											<img src="{{ asset('user/media/svg/brand-logos/google-podcasts.svg') }}" class="w-25px h-25px mb-2" alt="" />
											<span class="fw-semibold">Podcasts</span>
										</a>
									</div>
									<!--end::Col-->
									<!--begin::Col-->
									<div class="col-4">
										<a href="#" class="d-flex flex-column flex-center text-center text-gray-800 text-hover-primary bg-hover-light rounded py-4 px-3 mb-3">
											<img src="{{ asset('user/media/svg/brand-logos/figma-1.svg') }}" class="w-25px h-25px mb-2" alt="" />
											<span class="fw-semibold">Figma</span>
										</a>
									</div>
									<!--end::Col-->
									<!--begin::Col-->
									<div class="col-4">
										<a href="#" class="d-flex flex-column flex-center text-center text-gray-800 text-hover-primary bg-hover-light rounded py-4 px-3 mb-3">
											<img src="{{ asset('user/media/svg/brand-logos/github.svg') }}" class="w-25px h-25px mb-2" alt="" />
											<span class="fw-semibold">Github</span>
										</a>
									</div>
									<!--end::Col-->
									<!--begin::Col-->
									<div class="col-4">
										<a href="#" class="d-flex flex-column flex-center text-center text-gray-800 text-hover-primary bg-hover-light rounded py-4 px-3 mb-3">
											<img src="{{ asset('user/media/svg/brand-logos/gitlab.svg') }}" class="w-25px h-25px mb-2" alt="" />
											<span class="fw-semibold">Gitlab</span>
										</a>
									</div>
									<!--end::Col-->
									<!--begin::Col-->
									<div class="col-4">
										<a href="#" class="d-flex flex-column flex-center text-center text-gray-800 text-hover-primary bg-hover-light rounded py-4 px-3 mb-3">
											<img src="{{ asset('user/media/svg/brand-logos/instagram-2-1.svg') }}" class="w-25px h-25px mb-2" alt="" />
											<span class="fw-semibold">Instagram</span>
										</a>
									</div>
									<!--end::Col-->
									<!--begin::Col-->
									<div class="col-4">
										<a href="#" class="d-flex flex-column flex-center text-center text-gray-800 text-hover-primary bg-hover-light rounded py-4 px-3 mb-3">
											<img src="{{ asset('user/media/svg/brand-logos/pinterest-p.svg') }}" class="w-25px h-25px mb-2" alt="" />
											<span class="fw-semibold">Pinterest</span>
										</a>
									</div>
									<!--end::Col-->
								</div>
								<!--end::Row-->
							</div>
							<!--end::Scroll-->
						</div>
						<!--end::Card body-->
					</div>
					<!--end::Card-->
				</div>
				<!--end::My apps-->
				<!--end::Menu wrapper-->
			</div>
			<!--end::My apps-->
			<!--begin::Chat-->
			<div class="app-navbar-item ms-2 ms-lg-3">
				<!--begin::Menu wrapper-->
				<div class="btn btn-icon btn-icon-gray-500 btn-active-light btn-active-color-primary w-35px h-35px w-lg-40px h-lg-40px position-relative" id="kt_drawer_chat_toggle">
					<i class="ki-outline ki-notification-on fs-1"></i>
					<span class="position-absolute top-0 start-100 translate-middle badge badge-circle badge-danger w-15px h-15px ms-n4 mt-3">5</span>
				</div>
				<!--end::Menu wrapper-->
			</div>
			<!--end::Chat-->
		</div>
		<!--end::Navbar-->
	</div>
	<!--end::Navbar wrapper-->
</div>
<!--end::Header container-->
</div>
<!--end::Header-->