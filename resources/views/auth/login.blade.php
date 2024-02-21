@extends('layouts.auth')
@section('pagetitle', 'Log In')

@section('content')
	<div class="d-flex flex-column flex-lg-row flex-column-fluid ">
		<!--begin::Body-->
		<div class="d-flex flex-column flex-lg-row-fluid w-lg-50 p-10 order-2 order-lg-1 ">
			<!--begin::Form-->
			<div class="d-flex flex-center flex-column flex-lg-row-fluid ">
				<!--begin::Wrapper-->
				<div class="w-lg-500px p-10 ">
					<!--begin::Form-->
					<form class="form w-100 " method="POST" action="{{ route('login') }}">
					@csrf
						<!--begin::Heading-->
						<div class="text-center mb-11">
							<!--begin::Title-->
							<h1 class="text-gray-900 fw-bolder mb-3">Get Started</h1>
							<!--end::Title-->
							<!--begin::Subtitle-->
							<div class="text-gray-500 fw-semibold fs-6">A Smarter National ID Application Experience.</div>
							<!--end::Subtitle=-->
						</div>
						<div class="fv-row mb-8">
							<!--begin::Email-->
							<label>Email Address</label>
							<input id="login" class="form-control bg-transparent" type="text" name="login" value="{{ old('login') }}"  placeholder="Enter your email address" autocomplete="off" class="form-control bg-transparent" />
							<!--end::Email-->
						</div>
						<!--end::Input group=-->
						<div class="fv-row mb-3">
							<!--begin::Password-->
							<label>Password</label>
							<input type="password" id="password" placeholder="Enter your password" name="password" autocomplete="off" class="form-control bg-transparent" />
							<!--end::Password-->
						</div>
						<!--end::Input group=-->
						<!--begin::Wrapper-->
						<div class="d-flex flex-stack flex-wrap gap-3 fs-base fw-semibold mb-8">
							<div></div>
							<!--begin::Link-->
							@if (Route::has('password.request'))
							<a href="{{ route('password.request') }}" class="link-primary">Forgot Password ?</a>
							@endif
							<!--end::Link-->
						</div>
						<!--end::Wrapper-->
						<!--begin::Submit button-->
						<div class="d-grid mb-10">
							<button type="submit" class="btn btn-primary">
								Log In
							</button>
						</div>
						<!--end::Submit button-->
						<!--begin::Sign up-->
						<div class="text-gray-500 text-center fw-semibold fs-6">Not registered yet? 
						<a href="{{route('register')}}" class="link-primary">Register</a></div>
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
		@include('includes.auth.sidebar')
		<!--end::Aside-->
	</div>
@endsection