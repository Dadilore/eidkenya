@extends('admin.includes.admin_layout')

@section('pagetitle', 'Users')

@section('head-imports')
    <link href="{{ asset('assets/admin/css/datatables.bundle.css') }}" rel="stylesheet" />
@endsection

@section('content')
<div class="content d-flex flex-column flex-column-fluid" id="kt_content">
	<div id="kt_content_container" class="container-xxl">
		<div class="g-5 gx-xxl-8">
			<div class="card">
				<div class="card-header border-0 pt-5">
					<h3 class="card-title align-items-start flex-column">
						<span class="card-label fw-bold fs-3 mb-1">All Users</span>
						{{-- <span class="text-muted mt-1 fw-semibold fs-7">Over 500 new products</span> --}}
					</h3>
					<div class="card-toolbar">
						<button type="button" class="btn btn-sm btn-icon btn-color-primary btn-active-light-primary" data-kt-menu-trigger="click" data-kt-menu-placement="bottom-end">
							<span class="svg-icon svg-icon-2">
								<svg xmlns="http://www.w3.org/2000/svg" width="24px" height="24px" viewBox="0 0 24 24">
									<g stroke="none" stroke-width="1" fill="none" fill-rule="evenodd">
										<rect x="5" y="5" width="5" height="5" rx="1" fill="currentColor" />
										<rect x="14" y="5" width="5" height="5" rx="1" fill="currentColor" opacity="0.3" />
										<rect x="5" y="14" width="5" height="5" rx="1" fill="currentColor" opacity="0.3" />
										<rect x="14" y="14" width="5" height="5" rx="1" fill="currentColor" opacity="0.3" />
									</g>
								</svg>
							</span>
						</button>
						<div class="menu menu-sub menu-sub-dropdown menu-column menu-rounded menu-gray-800 menu-state-bg-light-primary fw-semibold w-200px" data-kt-menu="true">
							<div class="menu-item px-3">
								<div class="menu-content fs-6 text-dark fw-bold px-3 py-4">Quick Actions</div>
							</div>
							<div class="separator mb-3 opacity-75"></div>
							<div class="menu-item px-3">
								<a href="#" class="menu-link px-3">Add New User</a>
							</div>
							<div class="separator mt-3 opacity-75"></div>
							<div class="menu-item px-3">
								<a href="#" class="menu-link px-3">Manage Roles</a>
							</div>
						</div>
					</div>
				</div>
				<!--end::Header-->
				<!--begin::Body-->
				<div class="card-body pt-3">
					<!--begin::Table container-->
					<div class="table-responsive">
                        
                        <table id="users-laratable" class="table table-row-dashed table-row-gray-300 align-middle gs-0 gy-4">
                            <thead>
                                <tr class="fw-bolder text-muted">
                                    <th class="min-w-140px">Surname</th>
                                    <th class="min-w-140px">First Name</th>
                                    <th class="min-w-140px">Other Names</th>
                                    <th class="min-w-100px">Email Address</th>
                                    <th class="min-w-100px">Role</th>
                                    <th class="min-w-100px">Status</th>
                                    <th class="min-w-100px">Last Login</th>
                                    <th class="min-w-100px text-end">Actions</th>
                                </tr>
                            </thead>
                            <tbody>
                            </tbody>
                        </table>

					</div>
					<!--end::Table container-->
				</div>
                
				<!--begin::Body-->
			</div>
			<!--end::Tables Widget 10-->
		</div>
		<!--end::Row-->
	</div>
	<!--end::Container-->
</div>
<!--end::Content-->
@endsection
@push('scripts')
    <script src="{{ asset('assets/admin/js/datatables.bundle.js') }}"></script>

    <script>
        $(document).ready(function(){
            $("#users-laratable").DataTable({
                serverSide: true,
                ajax: "{{ route('users') }}",
                columns: [
                    { name: 'surname' },
                    { name: 'name' },
                    { name: 'middle_name' },
                    { name: 'email' },
                    { name: 'role' },
                    { name: 'status', orderable : false, searchable : false },
                    { name: 'log' },
                    { name: 'action', orderable : false, searchable : false }
                ],
                "language": {
                "lengthMenu": "Show _MENU_",
                },
                "dom":
                "<'row'" +
                "<'col-sm-6 d-flex align-items-center justify-content-start'l>" +
                "<'col-sm-6 d-flex align-items-center justify-content-end'f>" +
                ">" +

                "<'table-responsive'tr>" +

                "<'row'" +
                "<'col-sm-12 col-md-5 d-flex align-items-center justify-content-center justify-content-md-start'i>" +
                "<'col-sm-12 col-md-7 d-flex align-items-center justify-content-center justify-content-md-end'p>" +
                ">"
            });
        });
    </script>
@endpush