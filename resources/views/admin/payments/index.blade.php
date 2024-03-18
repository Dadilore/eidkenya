@extends('admin.includes.admin_layout')

@section('pagetitle', 'All Payments')

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
						<span class="card-label fw-bold fs-3 mb-1">All Payments</span>
						{{-- <span class="text-muted mt-1 fw-semibold fs-7">Over 500 new products</span> --}}
					</h3>
				</div>
				<!--end::Header-->
				<!--begin::Body-->
				<div class="card-body pt-3">
					<!--begin::Table container-->
					<div class="table-responsive">
                        
                        <table id="all_payments-laratable" class="table table-row-dashed table-row-gray-300 align-middle gs-0 gy-4">
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
            $("#all_payments-laratable").DataTable({
                serverSide: true,
                ajax: "{{ route('all_payments') }}",
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