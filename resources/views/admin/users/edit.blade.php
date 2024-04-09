@extends('admin.layouts.main')
@section('pageTitle', 'Update Users')
@section('content')

<div class="card my-5 mb-xxl-8 bg-light-primary">
		<div class="card-body pt-9 pb-0">
			<div class="d-flex flex-wrap flex-sm-nowrap">
				<div class="flex-grow-1">
					<div class="d-flex justify-content-between align-items-start flex-wrap mb-2">
						<div class="d-flex flex-column">
							<div class="d-flex align-items-center mb-2">
								<span class="text-gray-900 text-hover-primary fs-2 fw-bold me-1">Edit User</span>
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

    @if (session()->has('success'))
        <div class="container mt-5 ">
        <div class="alert alert-success alert-dismissible fade show mt-5 " role="alert">
            {{ session('success') }}
            <button type="button" class="btn-close btn btn-danger me-5 mt-5" data-bs-dismiss="alert" aria-label="Close"></button>
        </div>
        </div>
    @endif

<div class="d-flex flex-column flex-lg-row flex-column-fluid">
		<!--begin::Body-->
		<div class="d-flex flex-column flex-lg-row-fluid  ">
			<!--begin::Form-->
			<div class="d-flex flex-center flex-column flex-lg-row-fluid s">
				<!--begin::Wrapper-->
				<div class="w-100 py-10 px-5">
					<!--begin::Form-->
					<form method="POST" action="{{ route('admin.users.update', $data->id) }}" class="form w-100" novalidate="novalidate">
					@csrf
					

						<div class="row">
							<div class="col-md-4">
								<label for="surname" class="required">Surname </label>
								<div class="form-text">
									As indicated in Birth Certificate
								</div>
								<div class="fv-row mb-8">
									<!--begin::Name-->
									<input id="surname" type="text"  name="surname" value=" {{$data->surname}} "  class="form-control bg-transparent @error('surname') is-invalid @enderror" autocomplete="off"/>
									@error('surname')
										<span class="invalid-feedback" role="alert">
											<strong>{{ $message }}</strong>
										</span>
									@enderror
								</div>
							</div>
							<div class="col-md-4">
								<label for="name" class="required">First name </label>
								<div class="form-text">
									As indicated in Birth Certificate
								</div>
								<div class="fv-row mb-8">
									<!--begin::Name-->
									<input id="name" type="text"  name="name" value=" {{$data->name}} "  class="form-control bg-transparent @error('name') is-invalid @enderror" autocomplete="off"/>
									@error('name')
										<span class="invalid-feedback" role="alert">
											<strong>{{ $message }}</strong>
										</span>
									@enderror
								</div>
							</div>
							<div class="col-md-4">
								<label for="middle_name" class="required">Other names </label>
								<div class="form-text">
									As indicated in Birth Certificate
								</div>
								<div class="fv-row mb-8">
									<!--begin::Name-->
									<input id="middle_name" type="text"  name="middle_name" value=" {{$data->middle_name}} "  class="form-control bg-transparent @error('middle_name') is-invalid @enderror" autocomplete="off"/>
									@error('middle_name')
										<span class="invalid-feedback" role="alert">
											<strong>{{ $message }}</strong>
										</span>
									@enderror
								</div>
							</div>
						</div>
						<div class="row">
							<div class="col-md-6">
								<label for="email" class="required">Valid email address</label>
								<div class="fv-row mb-8">
									<input type="text"  id="email" value=" {{$data->email}} "  name="email" autocomplete="off" class="form-control bg-transparent @error('email') is-invalid @enderror" />
									@error('email')
										<span class="invalid-feedback" role="alert">
											<strong>{{ $message }}</strong>
										</span>
									@enderror
								</div>
							</div>
							<div class="col-md-6">
								<label for="phone" class="required">Valid phone number</label>
								<div class="fv-row mb-8">
									<input type="text"  id="phone" value=" {{$data->phone}} "  name="phone" autocomplete="off" class="form-control bg-transparent @error('phone') is-invalid @enderror" />
									@error('phone')
										<span class="invalid-feedback" role="alert">
											<strong>{{ $message }}</strong>
										</span>
									@enderror
								</div>
							</div>
						</div>
						<div class="row">
							<div class="col-md-6">
								<label for="sex" class="required">Gender</label>
								<div class="fv-row mb-8">
									<select id="sex" name="sex" class="form-control bg-transparent @error('sex') is-invalid @enderror">
										<option value="M" {{ $data->sex == "M" ? 'selected' : '' }}>Male</option>
										<option value="F" {{ $data->sex == "F" ? 'selected' : '' }}>Female</option>
									</select>
									@error('sex')
										<span class="invalid-feedback" role="alert">
											<strong>{{ $message }}</strong>
										</span>
									@enderror
								</div>
							</div>
							<div class="col-md-6">
								<label for="dob" class="required">Date of Birth</label>
								<div class="fv-row mb-8">
									<input type="date"  id="dob" value=" {{ \Carbon\Carbon::parse($data->dob)->format('d-m-Y') }}"  name="dob" autocomplete="off" class="form-control bg-transparent @error('dob') is-invalid @enderror" />
									@error('dob')
										<span class="invalid-feedback" role="alert">
											<strong>{{ $message }}</strong>
										</span>
									@enderror
								</div>
							</div>
							
							<div class="col-md-6">
								<label for="role" class="required">Role</label>
								<div class="fv-row mb-8">
									<select id="role" name="role" class="form-control bg-transparent @error('role') is-invalid @enderror">
										<option value="user" {{ $data->role == "user" ? 'selected' : '' }}>User</option>
										<option value="admin" {{ $data->role == "admin" ? 'selected' : '' }}>Admin</option>
										
									</select>
									@error('role')
										<span class="invalid-feedback" role="alert">
											<strong>{{ $message }}</strong>
										</span>
									@enderror
								</div>
							</div>

						</div>

						<!--begin::Input group-->
						<div class="fv-row mb-8" data-kt-password-meter="true">
							<!--begin::Wrapper-->
							<div class="mb-1">

								<!--begin::Input wrapper-->
									<label for="password" class="required">Password</label>
									<div class="position-relative mb-3">
										<input id="password" class="form-control bg-transparent @error('password') is-invalid @enderror" type="password" name="password" autocomplete="off" placeholder="Enter Your password" />
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
								@error('password')
									<span class="invalid-feedback" role="alert">
										<strong>{{ $message }}</strong>
									</span>
								@enderror
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
							<label for="password_confirmation" class="required">Confirm Password</label>
							<input id="password_confirmation"  name="password_confirmation" type="password" autocomplete="off" class="form-control bg-transparent @error('password_confirmation') is-invalid @enderror" placeholder="Confirm Password" />
							@error('password_confirmation')
							<span class="invalid-feedback" role="alert">
								<strong>{{ $message }}</strong>
							</span>
						@enderror
							<!--end::Repeat Password-->
						</div>
						<!--end::Input group=-->


						<!--begin::Submit button-->
						<div class="d-grid mb-10">
							<button type="submit" id="kt_sign_up_submit" class="btn btn-primary">
								<!--begin::Indicator label-->
								<span class="indicator-label">Update</span>
								<!--end::Indicator label-->
								<!--begin::Indicator progress-->
								<span class="indicator-progress">Please wait... 
								<span class="spinner-border spinner-border-sm align-middle ms-2"></span></span>
								<!--end::Indicator progress-->
							</button>
						</div>
						<!--end::Submit button-->

			
					</form>
					<!--end::Form-->
				</div>
				<!--end::Wrapper-->
			</div>
			<!--end::Form-->
			
		</div>
		<!--end::Body-->
	</div>


@endsection