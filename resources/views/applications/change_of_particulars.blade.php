@extends('includes.main')
@section('pageTitle', 'Apply for New ID')
@section('content')

<div class="container">
       <div class="row" style="margin-top:50px">
             <div class="col-md-11  justify-content-center">
                 <h1>ID Application</h1><hr>
                 @livewire('change_of_particulars')
             </div>
       </div>
   </div>
@endsection