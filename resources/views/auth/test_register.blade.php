@extends('layouts.auth')
@section('pagetitle', 'Register')

@section('content')
	<div class="d-flex flex-column flex-lg-row flex-column-fluid">
		<!--begin::Body-->
		<div class="d-flex flex-column flex-lg-row-fluid w-lg-50 p-10 order-2 order-lg-1  ">
			<!--begin::Form-->
			<div class="d-flex flex-center flex-column flex-lg-row-fluid s">
				<!--begin::Wrapper-->
				<div class="w-lg-500px p-10">
					<!--begin::Form-->
					<form method="POST" action="{{ route('register') }}" class="form w-100" novalidate="novalidate" >
					@csrf
						<!--begin::Heading-->
						<div class="text-center mb-11">
							<!--begin::Title-->
							<h1 class="text-gray-900 fw-bolder mb-3">Get Started</h1>
							<!--end::Title-->
							<!--begin::Subtitle-->
							<div class="text-gray-500 fw-semibold fs-6">Your identity our priority</div>
							<!--end::Subtitle=-->
						</div>
						<!--begin::Heading-->
						<!--begin::Login options-->
						<div class="row g-3 mb-9">
							
						</div>
						<!--end::Login options-->
						<!--begin::Separator-->
						<div class="separator separator-content my-14">
							<span class="w-125px text-gray-500 fw-semibold fs-7">Or with email</span>
						</div>
						<!--end::Separator-->
						<!--begin::Input group=-->
						
						<label value="__('Name')" >Name</label>
						<div class="fv-row mb-8">
							<!--begin::Name-->
							<input id="name" type="text"  name="name" value="{{ old('name') }}"  class="form-control bg-transparent" placeholder="Enter your Name" autocomplete="off"/>
							<!--end::Name-->
						</div>

						<label>Email</label>
						<div class="fv-row mb-8">
							<!--begin::Email-->
							<input type="text"  id="email" placeholder="Enter your Email" value="{{old('email')}}"  name="email" autocomplete="off" class="form-control bg-transparent" />
							<!--end::Email-->
						</div>

						<!--begin::Input group-->
						<div class="fv-row mb-8" data-kt-password-meter="true">
							<!--begin::Wrapper-->
							<div class="mb-1">

								<!--begin::Input wrapper-->
								<label>Password</label>
								<div class="position-relative mb-3">
									<input id="password" class="form-control bg-transparent" type="password"  name="password" autocomplete="off" placeholder="Enter Your password" />
									<span class="btn btn-sm btn-icon position-absolute translate-middle top-50 end-0 me-n2" data-kt-password-meter-control="visibility">
										<i class="ki-outline ki-eye-slash fs-2"></i>
										<i class="ki-outline ki-eye fs-2 d-none"></i>
									</span>
								</div>
								<!--end::Input wrapper-->
								<!--begin::Meter-->
								<div class="d-flex align-items-center mb-3" data-kt-password-meter-control="highlight">
									<div class="flex-grow-1 bg-secondary bg-active-success rounded h-5px me-2"></div>
									<div class="flex-grow-1 bg-secondary bg-active-success rounded h-5px me-2"></div>
									<div class="flex-grow-1 bg-secondary bg-active-success rounded h-5px me-2"></div>
									<div class="flex-grow-1 bg-secondary bg-active-success rounded h-5px"></div>
								</div>
								<!--end::Meter-->
							</div>
							<!--end::Wrapper-->
							<!--begin::Hint-->
							<div class="text-muted">Use 8 or more characters with a mix of letters, numbers & symbols.</div>
							<!--end::Hint-->
						</div>
						<!--end::Input group=-->
						<!--end::Input group=-->
						<div class="fv-row mb-8">
							<!--begin::Repeat Password-->
							<label>Confirm Password</label>
							<input id="password_confirmation"  name="password_confirmation" type="password" autocomplete="off" class="form-control bg-transparent" placeholder="Confirm Password" />
							<!--end::Repeat Password-->
						</div>
						<!--end::Input group=-->


						<!--begin::Accept-->
						<div class="fv-row mb-8">
							<label class="form-check form-check-inline">
								<input class="form-check-input" type="checkbox" name="toc" value="1" />
								<span class="form-check-label fw-semibold text-gray-700 fs-base ms-1">I Accept the 
								<a href="#" class="ms-1 link-primary">Terms</a></span>
							</label>
						</div>
						<!--end::Accept-->

						<!--begin::Submit button-->
						<div class="d-grid mb-10">
							<button type="submit" id="kt_sign_up_submit" class="btn btn-primary">
								<!--begin::Indicator label-->
								<span class="indicator-label">Sign up</span>
								<!--end::Indicator label-->
								<!--begin::Indicator progress-->
								<span class="indicator-progress">Please wait... 
								<span class="spinner-border spinner-border-sm align-middle ms-2"></span></span>
								<!--end::Indicator progress-->
							</button>
						</div>
						<!--end::Submit button-->

						<!--begin::Sign up-->
						<div class="text-gray-500 text-center fw-semibold fs-6">Already have an Account? 
						<a href="{{route('login')}}" class="link-primary fw-semibold">Sign in</a></div>
						<!--end::Sign up-->
					</form>
					<!--end::Form-->
				</div>
				<!--end::Wrapper-->
			</div>
			<!--end::Form-->
			
		</div>
		<!--end::Body-->
		<!--begin::Aside-->
		<div class="d-flex flex-lg-row-fluid w-lg-50 bgi-size-cover bgi-position-center order-1 order-lg-2" style="background-image: url({{ asset ('user/media/misc/auth-bg.png')}}) }}">
			<!--begin::Content-->
			<div class="d-flex flex-column flex-center py-7 py-lg-15 px-5 px-md-15 w-100">
				<!--begin::Logo-->
				<a href="{{ route ('home') }}" class="mb-0 mb-lg-12">
					<img alt="Logo" src="{{asset ('assets/images/logo/logo_t.png') }}" class="h-60px h-lg-75px" />
				</a>
				<!--end::Logo-->
				<!--begin::Image-->
				<img class="d-none d-lg-block mx-auto w-275px w-md-50 w-xl-500px mb-10 mb-lg-20" src="{{ asset ('user/media/misc/auth-screens.png')}}" alt="" />
				<!--end::Image-->
				<!--begin::Title-->
				<h1 class="d-none d-lg-block text-white fs-2qx fw-bolder text-center mb-7">Fast, Efficient and Productive</h1>
				<!--end::Title-->
				
			</div>
			<!--end::Content-->
		</div>
		<!--end::Aside-->
	</div>

@endsection