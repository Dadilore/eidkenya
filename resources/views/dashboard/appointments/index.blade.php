@extends('includes.main')
@section('pageTitle', 'My Appointments')
@section('content')

<div id="kt_app_content" class="app-content  flex-column-fluid ">
        
    <div id="kt_app_content_container" class="app-container  container-xxl ">
		@include('dashboard.components.profile')
        <div class="row g-5 g-xl-10 my-5 mb-xl-10">
            <div class="col-xl-12">
        <div class="card card-flush h-md-100">
            <div class="card-header pt-7">
                <h3 class="card-title align-items-start flex-column">
                    <span class="card-label fw-bold fs-3 mb-1">Appointments History</span>
                    
                    <span class="text-muted fw-semibold fs-7">Ordered by Recent</span>
                </h3>
                <div class="card-toolbar">   
                    <a href="" class="btn btn-sm btn-primary">Make Appointment</a>             
                </div>
            </div>
            <div class="card-body pt-6">    
                <div class="table-responsive">
                    <table class="table table-row-dashed align-middle gs-0 gy-3 my-0">
                        <thead>
                            <tr class="fs-7 fw-bold text-gray-500 border-bottom-0">                                    
                                <th class="p-0 pb-3 min-w-175px text-start">APPOINTMENT</th>
                                <th class="p-0 pb-3 min-w-100px text-end">DATE</th>
                                <th class="p-0 pb-3 min-w-100px text-end pe-12">STATUS</th>
                                <th class="p-0 pb-3 min-w-100px text-end">CREATED ON</th>                                
                                <th class="p-0 pb-3 min-w-150px text-end">ACTIONS</th>
                            </tr>
                        </thead>
                        <tbody>
                                                    
                            <tr>                            
                                <td>
                                    <div class="d-flex align-items-center">                                            
                                        <div class="d-flex justify-content-start flex-column">
                                            <a href="#" class="text-gray-800 fw-bold text-hover-primary mb-1 fs-6">New ID Application 07</a>
                                            <span class="text-gray-500 fw-semibold d-block fs-7">uid2358</span>
                                        </div>
                                    </div>                                
                                </td>
    
                                <td class="text-end pe-0">
                                    <span class="text-gray-600 fw-bold fs-6">16 April, 2023</span>                                
                                </td>                           
                                
                                <td class="text-end pe-12">
                                    <span class="badge py-3 px-4 fs-7 badge-light-primary">Upcoming</span>
                                </td>  
    
                                <td class="text-end pe-0">
                                    <span class="text-gray-600 fw-bold fs-6">07 Feb, 2023</span>                                
                                </td>   
    
                                <td class="text-end">
                                    <div class="flex">
                                    <a href="#" class="btn btn-sm btn-icon-primary btn-bg-light btn-active-color-primary me-2">
                                        <i class="ki-duotone ki-calendar-edit">
                                            <span class="path1"></span>
                                            <span class="path2"></span>
                                            <span class="path3"></span>
                                        </i>
                                        Reschedule
                                    </a>
                                    <a href="#" class="btn btn-sm btn-icon-danger bg-light-danger btn-active-color-danger">
                                        <i class="ki-duotone ki-trash">
                                            <span class="path1"></span>
                                            <span class="path2"></span>
                                            <span class="path3"></span>
                                            <span class="path4"></span>
                                            <span class="path5"></span>
                                        </i>
                                        Delete
                                    </a>
                                    </div>
                                </td>
                            </tr>    
                        </tbody>
                    </table>
                </div>    
            </div>
        </div>
    </div>
    
        </div>
    </div>
</div>

@endsection