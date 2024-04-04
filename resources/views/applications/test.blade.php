@extends('includes.main')
@section('pageTitle', 'My Applications')
@section('content')

<div id="kt_app_content" class="app-content  flex-column-fluid ">
        
    <div id="kt_app_content_container" class="app-container  container-xxl ">
		@include('dashboard.components.profile')
        <div class="row g-5 g-xl-10 my-5 mb-xl-10">
            <div class="col-xl-12">
        <div class="card card-flush h-md-100">
            <div class="card-header pt-7">
                <h3 class="card-title align-items-start flex-column">
                    <span class="card-label fw-bold fs-3 mb-1">Applications History</span>
                    
                    <span class="text-muted fw-semibold fs-7">Ordered by Recent</span>
                </h3>
            </div>
            <div class="card-body pt-6">    
                <div class="table-responsive">
                    <table class="table table-row-dashed align-middle gs-0 gy-3 my-0">
                        <thead>
                            <tr class="fs-7 fw-bold text-gray-500 border-bottom-0">                                    
                                <th class="p-0 pb-3 min-w-175px text-start">APPLICATION</th>
                                <th class="p-0 pb-3 min-w-175px text-start">APPLICATION TYPE</th>
                                <th class="p-0 pb-3 min-w-100px text-end">CREATED ON</th>
                                <th class="p-0 pb-3 min-w-100px text-end pe-12">STATUS</th>                           
                                <th class="p-0 pb-3 min-w-150px text-end">APPOINTMENTS</th>
                                <th class="p-0 pb-3 min-w-150px text-end">RECEIPT</th>
                            </tr>
                        </thead>
                        <tbody>
                             
                            @foreach($data as $applications)
                                <tr>                            
                                    <td>
                                        <div class="d-flex align-items-center">                                            
                                            <div class="d-flex justify-content-start flex-column">
                                                <a href="#" class="text-gray-800 fw-bold text-hover-primary mb-1 fs-6">New ID Application 07</a>
                                                <span class="text-gray-500 fw-semibold d-block fs-7">{{$applications->id}}</span>
                                            </div>
                                        </div>                                
                                    </td>

                                    <td class="text-end pe-0">
                                        <span class="text-gray-600 fw-bold fs-6">{{$applications->application_type}}</span>                                
                                    </td> 
        
                                    <td class="text-end pe-0">
                                        <span class="text-gray-600 fw-bold fs-6">{{$applications->created_on}}</span>                                
                                    </td>                           
                                    
                                    <td class="text-end pe-12">
                                        <span class="badge py-3 px-4 fs-7 badge-light-danger">{{$applications->application_status}}</span>
                                    </td>   
        
                                    <td class="text-end">
                                        <div class="flex">
                                        <a href="#" class="btn btn-sm btn-icon-white btn-bg-primary text-white me-2">
                                            Pay
                                        </a>
                                        <a href="#" class="btn btn-sm btn-icon-primary btn-light-primary btn-active-bg-primary text-active-white">
                                            <i class="ki-duotone ki-file-down">
                                                <span class="path1"></span>
                                                <span class="path2"></span>
                                            </i>
                                            Download Invoice
                                        </a>
                                        </div>
                                    </td>
                                </tr>  
                                                        
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
                                        <span class="badge py-3 px-4 fs-7 badge-light-warning">Biometric Capture</span>
                                    </td>
        
                                    <td class="text-end">
                                        <div class="flex">
                                        <a href="#" class="btn btn-sm btn-icon-white btn-bg-primary text-white me-2">
                                            Make Appointment
                                        </a>
                                        </div>
                                    </td>
                                </tr>  
                                                        
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
                                        <span class="badge py-3 px-4 fs-7 badge-light-success">Pick Up Ready</span>
                                    </td>    
        
                                    <td class="text-end">
                                        <div class="flex">
                                            <a href="#" class="btn btn-sm btn-icon-white btn-bg-primary text-white me-2">
                                                Make Appointment
                                            </a>
                                        </div>
                                    </td>
                                </tr>
                            @endforeach 
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