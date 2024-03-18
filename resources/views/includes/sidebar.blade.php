<!--begin::Sidebar-->
<div id="kt_app_sidebar" class="app-sidebar" data-kt-drawer="true" data-kt-drawer-name="app-sidebar" data-kt-drawer-activate="{default: true, lg: false}" data-kt-drawer-overlay="true" data-kt-drawer-width="auto" data-kt-drawer-direction="start" data-kt-drawer-toggle="#kt_app_sidebar_mobile_toggle" >
<!--begin::Sidebar primary-->
<div class="app-sidebar-primary">
	<div class="app-sidebar-menu flex-grow-1 hover-scroll-y scroll-ms my-5" id="kt_aside_menu_wrapper" data-kt-scroll="true" data-kt-scroll-height="auto" data-kt-scroll-dependencies="#kt_app_sidebar_logo, #kt_app_sidebar_footer" data-kt-scroll-wrappers="#kt_app_sidebar_menu" data-kt-scroll-offset="5px">
		<!--begin::Menu-->
		<div id="kt_aside_menu" class="menu menu-column menu-title-gray-600 menu-state-primary menu-state-icon-primary menu-state-bullet-primary menu-arrow-gray-500 fw-semibold fs-6" data-kt-menu="true">
			<div class="menu-item here show py-2">
				<a class="menu-link menu-center"  href="{{ route('dashboard') }}" >
					<span class="menu-icon me-0">
						<i class="ki-outline ki-home-1 fs-1"></i>
					</span>
				</a>
			</div>
			<div data-kt-menu-trigger="{default: 'click', lg: 'hover'}" data-kt-menu-placement="right-start" class="menu-item py-2">
				<span class="menu-link menu-center">
					<span class="menu-icon me-0">
						<i class="ki-outline ki-shield-tick fs-1"></i>
					</span>
				</span>
				<div class="menu-sub menu-sub-dropdown px-2 py-4 w-200px w-lg-225px mh-75 overflow-auto">
					<div class="menu-item">
						<div class="menu-content">
							<span class="menu-section fs-5 fw-bolder ps-1 py-1">Applications</span>
						</div>
					</div>
					<div class="menu-item">
						<a class="menu-link" href="{{ route('applications.create') }}" target="_blank" title="Check out over 200 in-house components" data-bs-toggle="tooltip" data-bs-trigger="hover" data-bs-dismiss="click" data-bs-placement="right">
							<span class="menu-bullet">
								<span class="bullet bullet-dot"></span>
							</span>
							<span class="menu-title">New Application</span>
						</a>
					</div>
					<div class="menu-item">
						<a class="menu-link" href="{{ route('applications.index') }}" target="_blank" title="Check out the complete documentation" data-bs-toggle="tooltip" data-bs-trigger="hover" data-bs-dismiss="click" data-bs-placement="right">
							<span class="menu-bullet">
								<span class="bullet bullet-dot"></span>
							</span>
							<span class="menu-title">My Applications</span>
						</a>
					</div>
				</div>
			</div>
			<div class="menu-item py-2">
				<a class="menu-link menu-center"  href="{{ route('appointments.index') }}" >
					<span class="menu-icon me-0">
						<i class="ki-outline ki-calendar fs-1"></i>
					</span>
				</a>
			</div>
			<div class="menu-item py-2">
				<a class="menu-link menu-center"  href="{{ route('payments.index') }}" >
					<span class="menu-icon me-0">
						<i class="ki-outline ki-dollar fs-1"></i>
					</span>
				</a>
			</div>
		</div>
	</div>
	<!--begin::Footer-->
	<div class="d-flex flex-column mt-5 flex-center pb-4 pb-lg-8" id="kt_app_sidebar_footer">
		<!--begin::User menu-->
		<div class="cursor-pointer symbol symbol-40px mb-9" data-kt-menu-trigger="{default: 'click', lg: 'hover'}" data-kt-attach="parent" data-kt-menu-placement="right-end">
		<img style="height:70%;" src="{{asset ('assets/images/profile/augustine.jpg') }}" alt="image">
		</div>
		<!--begin::User account menu-->
		<div class="menu menu-sub menu-sub-dropdown menu-column menu-rounded menu-gray-800 menu-state-bg menu-state-color fw-semibold py-4 fs-6 w-275px" data-kt-menu="true">
			<!--begin::Menu item-->
			<div class="menu-item px-3">
				<div class="menu-content d-flex align-items-center px-3">
					<!--begin::Avatar-->
					<div class="symbol symbol-50px me-5">
					<img style="height:70%;" src="{{asset ('assets/images/profile/augustine.jpg') }}" alt="image">
					</div>
					<!--end::Avatar-->
					<!--begin::Username-->
					<div class="d-flex flex-column">
						<div class="fw-bold d-flex align-items-center fs-5">{{ Auth::user()->name }} 
						</div>
						<a href="#" class="fw-semibold text-muted text-hover-primary fs-7">{{ Auth::user()->email }}</a>
					</div>
					<!--end::Username-->
				</div>
			</div>
			<!--end::Menu item-->
			<!--begin::Menu separator-->
			<div class="separator my-2"></div>
			<!--end::Menu separator-->
			<!--begin::Menu item-->
			<div class="menu-item px-5">
				<a href="#" class="menu-link px-5">My Profile</a>
			</div>
			<!--end::Menu item-->
			
			<!--begin::Menu separator-->
			<div class="separator my-2"></div>
			<!--end::Menu separator-->

			<!--begin::Menu item-->
			<div class="menu-item px-5" data-kt-menu-trigger="{default: 'click', lg: 'hover'}" data-kt-menu-placement="left-start" data-kt-menu-offset="-15px, 0">
				<a href="#" class="menu-link px-5">
					<span class="menu-title position-relative">Mode 
					<span class="ms-5 position-absolute translate-middle-y top-50 end-0">
						<i class="ki-outline ki-night-day theme-light-show fs-2"></i>
						<i class="ki-outline ki-moon theme-dark-show fs-2"></i>
					</span></span>
				</a>
				<!--begin::Menu-->
				<div class="menu menu-sub menu-sub-dropdown menu-column menu-rounded menu-title-gray-700 menu-icon-gray-500 menu-active-bg menu-state-color fw-semibold py-4 fs-base w-150px" data-kt-menu="true" data-kt-element="theme-mode-menu">
					<!--begin::Menu item-->
					<div class="menu-item px-3 my-0">
						<a href="#" class="menu-link px-3 py-2" data-kt-element="mode" data-kt-value="light">
							<span class="menu-icon" data-kt-element="icon">
								<i class="ki-outline ki-night-day fs-2"></i>
							</span>
							<span class="menu-title">Light</span>
						</a>
					</div>
					<!--end::Menu item-->
					<!--begin::Menu item-->
					<div class="menu-item px-3 my-0">
						<a href="#" class="menu-link px-3 py-2" data-kt-element="mode" data-kt-value="dark">
							<span class="menu-icon" data-kt-element="icon">
								<i class="ki-outline ki-moon fs-2"></i>
							</span>
							<span class="menu-title">Dark</span>
						</a>
					</div>
					<!--end::Menu item-->
					<!--begin::Menu item-->
					<div class="menu-item px-3 my-0">
						<a href="#" class="menu-link px-3 py-2" data-kt-element="mode" data-kt-value="system">
							<span class="menu-icon" data-kt-element="icon">
								<i class="ki-outline ki-screen fs-2"></i>
							</span>
							<span class="menu-title">System</span>
						</a>
					</div>
					<!--end::Menu item-->
				</div>
				<!--end::Menu-->
			</div>
			<!--end::Menu item-->
			
			
			<!--begin::Menu item-->
			<div class="menu-item px-5">
				<form method="POST" action="{{ route('logout') }}">
					@csrf
					<button type="submit" style="background-color:white; border:1px solid white;" class="menu-link px-5">Sign Out</button>
				</form>
			</div>
			<!--end::Menu item-->

		</div>
		<!--end::User account menu-->
		<!--begin::Action-->
		<div class="app-navbar-item">
			<!--begin::Link-->
			<a href="#" class="">
				<i class="ki-outline ki-exit-right fs-1"></i>
			</a>
			<!--end::Link-->
		</div>
		<!--end::Action-->
	</div>
	<!--end::Footer-->

	
</div>
<!--end::Sidebar primary-->



<!--begin::Sidebar secondary-->
<div class="app-sidebar-secondary">
	<!--begin::Sidebar secondary menu-->

		<!--begin::Logo-->
		<div class="app-sidebar-logo d-none d-md-flex flex-center pt-10 pb-2" id="kt_app_sidebar_logo">

		<!--begin::Logo image-->
		<a href="{{ route('dashboard') }}">
			<img alt="Logo" src="{{ asset ('assets/images/logo/logo_w_t.png') }}" class="h-30px" />
		</a>
		<!--end::Logo image-->
		
	</div>
	<!--end::Logo-->


	
	<div class="menu menu-sub-indention menu-rounded menu-column fw-semibold fs-6 py-4 py-lg-6" id="kt_app_sidebar_secondary_menu" data-kt-menu="true">
		<div id="kt_app_sidebar_secondary_menu_wrapper" class="hover-scroll-y mx-3 px-4" data-kt-scroll="true" data-kt-scroll-activate="{default: true, lg: true}" data-kt-scroll-height="auto" data-kt-scroll-wrappers="#kt_app_sidebar_secondary_menu" data-kt-scroll-offset="20px">
			<!--begin:Menu item-->
			<div class="menu-item">
				<!--begin:Menu content-->
				<div class="menu-content">
					<span class="menu-section fs-5 fw-bolder ps-1 py-1">User Dashboard</span>
				</div>
				<!--end:Menu content-->
			</div>
			<!--end:Menu item-->
			<!--begin:Menu item-->
			<div class="menu-item">
				<!--begin:Menu link-->
				<a class="menu-link  active" href="{{ route('dashboard') }}">
					<span class="menu-bullet">
						<span class="bullet bullet-dot"></span>
					</span>
					<span class="menu-title">Dashboard</span>
				</a>
				<!--end:Menu link-->
			</div>
			<!--end:Menu item-->
			<!--begin:Menu item-->
			<div class=" mt-5 menu-item">
				<!--begin:Menu link-->
				<a class="menu-link  active" href="{{route('applications.create')}}">
					<span class="menu-bullet">
						<span class="bullet bullet-dot"></span>
					</span>
					<span class="menu-title">Apply for ID</span>
				</a>
				<!--end:Menu link-->
			</div>
			<!--end:Menu item-->
			<!--begin:Menu item-->
			<div class="mt-5 menu-item">
				<!--begin:Menu link-->
				<a class="menu-link  active" href="{{ route('applications.index') }}">
					<span class="menu-bullet">
						<span class="bullet bullet-dot"></span>
					</span>
					<span class="menu-title">My application</span>
				</a>
				<!--end:Menu link-->
			</div>
			<!--end:Menu item-->

			<!--begin:Menu item-->
			<div class="mt-5 menu-item">
				<!--begin:Menu link-->
				<a class="menu-link  active" href="{{ route('appointments.index') }}">
					<span class="menu-bullet">
						<span class="bullet bullet-dot"></span>
					</span>
					<span class="menu-title">My appointments</span>
				</a>
				<!--end:Menu link-->
			</div>
			<!--end:Menu item-->
			<!--begin:Menu item-->
			<div class="mt-5 menu-item">
				<!--begin:Menu link-->
				<a class="menu-link  active" href="{{ route('home') }}">
					<span class="menu-bullet">
						<span class="bullet bullet-dot"></span>
					</span>
					<span class="menu-title">Homepage</span>
				</a>
				<!--end:Menu link-->
			</div>
			<!--end:Menu item-->
			<div class="aside-footer flex-column-auto py-5" id="kt_aside_footer">
        <form method="POST" action="{{ route('logout') }}">
            @csrf	
            <a :href="route('logout')"
            onclick="event.preventDefault();
            this.closest('form').submit();" class="btn btn-flex btn-custom btn-primary w-100" data-bs-toggle="tooltip" data-bs-trigger="hover" data-bs-dismiss-="click" title="Go to main PIA page">
                <span class="btn-label">Log Out</span>
            </a>
        </form>
        
    </div>
		</div>
	</div>
	<!--end::Sidebar secondary menu-->
</div>
<!--end::Sidebar secondary-->
<!--begin::Sidebar secondary toggle-->
<button id="kt_app_sidebar_secondary_toggle" class="app-sidebar-secondary-toggle btn btn-sm btn-icon bg-body btn-color-gray-600 btn-active-color-primary position-absolute translate-middle z-index-1 start-100 end-0 bottom-0 shadow-sm d-none d-lg-flex mb-4" data-kt-toggle="true" data-kt-toggle-state="active" data-kt-toggle-target="body" data-kt-toggle-name="app-sidebar-secondary-collapse">
	<i class="ki-outline ki-arrow-left fs-2 rotate-180"></i>
</button>
<!--end::Sidebar secondary toggle-->
</div>
<!--end::Sidebar-->