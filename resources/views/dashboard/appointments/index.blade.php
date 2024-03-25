@extends('includes.main')
@section('pageTitle', 'My Appointments')
@section('content')

<div id="kt_app_content" class="app-content  flex-column-fluid ">
        
    <div id="kt_app_content_container" class="app-container  container-xxl ">
		@include('dashboard.components.profile')

        @if (session()->has('success'))
            <div class="container mt-5">
                <div class="alert alert-success alert-dismissible fade show mt-5" role="alert">
                    {{ session('success') }}
                    <button type="button" class="btn-close btn btn-danger me-5 mt-2" data-bs-dismiss="alert" aria-label="Close"></button>
                </div>
            </div>
        @endif

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
                                <th class="p-0 pb-3 min-w-100px text-end">TIME</th>
                                <th class="p-0 pb-3 min-w-100px text-end">VENUE</th>
                                <th class="p-0 pb-3 min-w-100px text-end pe-12">STATUS</th>
                                <th class="p-0 pb-3 min-w-100px text-end">CREATED ON</th>                                
                                <th class="p-0 pb-3 min-w-150px text-end">ACTIONS</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach($appoint as $appoints)                       
                                <tr>                            
                                    <td>
                                        <div class="d-flex align-items-center">                                            
                                            <div class="d-flex justify-content-start flex-column">
                                                <a href="#" class="text-gray-800 fw-bold text-hover-primary mb-1 fs-6">Appointment ID {{$appoints->id}}</a>
                                                <span class="text-gray-500 fw-semibold d-block fs-7">uid{{$appoints->user_id}}</span>
                                            </div>
                                        </div>                                
                                    </td>
        
                                    <td class="text-end pe-0">
                                        <span class="text-gray-600 fw-bold fs-6">{{$appoints->appointment_date}}</span>                                
                                    </td>
                                    
                                    <td class="text-end pe-0">
                                        <span class="text-gray-600 fw-bold fs-6">{{$appoints->appointment_time}}</span>                                
                                    </td>

                                    <td class="text-end pe-0">
                                        <span class="text-gray-600 fw-bold fs-6">{{$appoints->appointment_venue}}</span>                                
                                    </td>
                                    
                                    <td class="text-end pe-0">
                                        <span class="badge py-3 px-4 fs-7 badge-light-primary">{{$appoints->status}}</span>
                                    </td>  
        
                                    <td class="text-end pe-0">
                                        <span class="text-gray-600 fw-bold fs-6">{{$appoints->created_at}}</span>                                
                                    </td>   
        
                                    <td class="text-end">
                                        <div class="d-flex">

                                            <a href="{{ route('appointments.edit', $appoints->id) }}" class="btn btn-secondary btn-sm btn-icon-primary btn-bg-light btn-active-color-primary me-2">
                                                Reschedule
                                            </a>


                                            <form action="{{ route('appointments.destroy', $appoints->id) }}" method="POST" style="display: inline;">
                                                @csrf
                                                @method('DELETE')
                                                <button type="submit" class="btn btn-sm btn-secondary btn-icon-danger bg-light-danger btn-active-color-danger" onclick="return confirm('Are you sure you want to cancel this Appointment?')">Cancel</button>
                                            </form>




                                            
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