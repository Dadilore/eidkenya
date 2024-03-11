    @extends('includes.main')
    @section('pageTitle', 'Payment')
    @section('content')



    <div class="step-six" id="6">
        <div class="card">

            <div class="container">
                <div class="card my-5 mb-xxl-8 bg-light-primary">
                    <div class="card-body pt-9 pb-0">
                        <div class="d-flex flex-wrap flex-sm-nowrap">
                            <div class="flex-grow-1">
                                <div class="d-flex justify-content-between align-items-start flex-wrap mb-2">
                                    <div class="d-flex flex-column">
                                        <div class="d-flex align-items-center mb-2">
                                            <span class="text-gray-900 text-hover-primary fs-2 fw-bold me-1">Payment</span>
                                        </div>
                                        <div class="d-flex flex-wrap fw-semibold fs-6 mb-4 pe-2">
                                            <span class="d-flex align-items-center text-gray-500 text-hover-primary me-5 mb-2">
                                                <span class="fw-bolder ms-1"></span></span>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>    
            </div>

            <div class="card-body">

            @if (session()->has('success'))
                <div class="container mt-5">
                <div class="alert alert-success alert-dismissible fade show mt-5 " role="alert">
                    {{ session('success') }}
                    <a href="{{url('make_appointment')}}"><button type="" class="btn btn-md btn-primary" > Make Appointment </button></a>
                    <button type="button" class="btn-close btn btn-danger me-5 mt-5" data-bs-dismiss="alert" aria-label="Close"></button>
                </div>
                </div>
            @endif

                <!-- ======= payment Section ======= -->
                <div class="container">
                    <div class="card">
                        <!-- <div class="card-header "></div> -->
                        <div class="card-body">
                            <section id="payment" class="payment">
                                <div style="display: flex; justify-content: space-between;">

                                    <form action="{{ route('mpesa.stkpush') }}" method="POST" enctype="multipart/form-data">
                                        @csrf
                                        <div style="background-color: #f0f0f0;  padding: 30px; margin-right:50px;">
                                            <h2>Pay via stk push</h2>
                                            <div class="col-lg-12">
                                                <div class="row ">
                                                    <label for=""><h4 style="color:green;">Enter Your Safaricon M-PESA Phone number</h4></label>
                                                    <div class="col-md-6 ">
                                                        <input type="number" class="form-control" name="phonenumber" placeholder="Enter your Phone number" required>
                                                    </div>
                                                    
                                                </div>
                                                <div class="action-buttons d-flex justify-content-between flex-end pt-3 pb-2 mb-5 shadow_lg">
                                                    <button type="submit" class="btn btn-lg btn-primary mt-5">Pay</button>
                                                </div>
                                            </div>
                                        </div>     
                                    </form>

                                    <div style="background-color: #e0e0e0;  padding: 30px;">
                                        <h2>Pay via paybill</h2>
                                        <div class="col-lg-12">
                                            <div class="row ">
                                                <div class="col-md-12 ">
                                                    <h5>Use the following steps to pay via paybill</h5>
                                                    <p>1. Go to M-PESA menu</p><br>
                                                    <p>2. Click on "lipa na M-PESA"</p><br>
                                                    <p>3. Go to Paybill</p><br>
                                                    <p>4. Enter Business Number 2222</p><br>
                                                    <p>5. Enter Account number eIDKenya</p><br>
                                                    <p>6. Key in 1000 Kenya shillings</p><br>
                                                    <p>6. Enter your M-PESA pin</p><br>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </section>
                        </div>
                    </div>
                </div>
                <!-- End payment Section -->
            </div>
        </div>
    </div>


    @endsection