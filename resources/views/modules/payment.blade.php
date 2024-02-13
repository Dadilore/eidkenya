@extends('includes.main')
@section('pageTitle', 'Home')
@section('content')

<form action="{{ route('pay.stk') }}" method="GET" enctype="multipart/form-data" >
    @csrf
        <div class="step-six" id="6">
            <div class="card">
                <div class="card-header bg-primary "><h3 class="mt-5">STEP 6/6 - PAYMENT</h3></div>
                <div class="card-body">
                    <!-- ======= payment Section ======= -->
                    <section id="payment" class="payment">

                        <div class="container">

                            <div class="row gy-4">

                                <div class="col-lg-12">
                                    
                                        <div class="row gy-4"> 

                                            <label for="">Name</label>
                                            <div class="col-md-6">
                                                <input type="text" name="name" class="form-control" placeholder="Enter Name" required>
                                            </div>

                                            <label for="">Phone number</label>
                                            <div class="col-md-6 ">
                                                <input type="number" class="form-control" name="number" placeholder="Enter your Phone number" required>
                                            </div>

                                        </div>
                                   
                                </div>

                            </div>
                        </div>

                        <div class="action-buttons d-flex justify-content-between bg-white pt-3 pb-2 mb-5 shadow_lg">
                            <!-- <a href="{{route('application')}}"><button type="button" class="btn btn-md btn-secondary mt-5">Back</button></a> -->
                            <button type="submit" class="btn btn-md btn-primary mt-5">Pay</button>
                        </div>

                    </section>
                    <!-- End payment Section -->
                </div>
            </div>
        </div>
</form>

@endsection