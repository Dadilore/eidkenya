@extends('includes.main')
@section('pageTitle', 'Home')
@section('content')


        <div class="step-six" id="6">
            <div class="card">
                <div class="card-header bg-primary "><h3 class="mt-5">STEP 6/6 - PAYMENT</h3></div>
                <div class="card-body">
                    <!-- ======= payment Section ======= -->
                    <section id="payment" class="payment">

                        <div class="container">

                            <div class="row gy-4">
                        
                                <div style="display: flex; justify-content: space-between;">
                                <form action="{{ route('mpesa.stkpush') }}" method="POST" enctype="multipart/form-data">
                                    @csrf
                                    <div style="background-color: #f0f0f0;  padding: 30px;">
                                        <h2>Pay via stk push</h2>
                                        <div class="col-lg-12">
                                            <div class="row ">
                                                <label for=""><h4 style="color:green;">Enter Your Safaricon M-PESA Phone number</h4></label>
                                                <div class="col-md-6 ">
                                                    <input type="number" class="form-control" name="phonenumber" placeholder="Enter your Phone number" required>

                                                    <label for=""><h4 style="color:green;">Amount</h4></label>
                                                <div class="col-md-6 ">
                                                    <input type="number" class="form-control" name="amount" placeholder="Enter your Phone number" required>
                                                    <label for=""><h4 style="color:green;">Account Number</h4></label>
                                                <div class="col-md-6 ">
                                                    <input type="number" class="form-control" name="account_number" placeholder="Enter your Phone number" required>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="action-buttons d-flex justify-content-between bg-white pt-3 pb-2 mb-5 shadow_lg">
                                        <button type="submit" class="btn btn-md btn-primary mt-5">Pay</button>
                                    </div>
                                </form>

                                    <div style="background-color: #e0e0e0;  padding: 30px;">
                                        <h2>Pay via paybill</h2>
                                        <div class="col-lg-12">
                                            <div class="row ">
                                                <div class="col-md-12 ">
                                                    <p>1. Go to M-PESA menu</p><br>
                                                    <p>2. Click on "lipa na M-PESA"</p><br>
                                                    <p>3. Go to Paybill</p><br>
                                                    <p>4. Enter Business Number 2222</p><br>
                                                    <p>5. Enter Account number gok</p><br>
                                                    <p>6. Key in 1000 Kenya shillings</p><br>
                                                    <p>6. Enter your M-PESA pin</p><br>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        

                        

                    </section>
                    <!-- End payment Section -->
                </div>
            </div>
        </div>


@endsection