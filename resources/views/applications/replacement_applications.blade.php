@extends('includes.main')
@section('pageTitle', 'Home')
@section('content')

<div class="container">
       <div class="row" style="margin-top:50px">
             <div class="col-md-11  justify-content-center">
                 <h1>ID Application</h1><hr>
                 @livewire('replacement-applicants')
             </div>
       </div>
   </div>
@endsection