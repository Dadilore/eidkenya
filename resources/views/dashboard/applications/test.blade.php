@extends('includes.main')
@section('pageTitle', 'My Applications')
@section('content')

<div id="kt_app_content" class="app-content  flex-column-fluid ">
        
    <div id="kt_app_content_container" class="app-container  container-xxl ">
		@include('dashboard.components.profile')
        @livewire('livewire-test')
    </div>
</div>
@endsection