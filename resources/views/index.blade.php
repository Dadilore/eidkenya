@extends('layouts.main')
@section('pageTitle', 'Home')
@section('content')

<title>@section('pageTitle') eIDKenya @show</title>


<main id="main">
    <!-- ======= Hero Section ======= -->
    <section id="hero" class="d-flex align-items-center">
        <div class="container" data-aos="zoom-out" data-aos-delay="50">
          <div class="content">
            <h1>eID <span>Kenya</span></h1><br>
            <h2>Your Seamless Gateway to a Smarter National ID Application Experience.</h2>
            <div class="d-flex">
                <a href="{{ route('login') }}" class="btn-get-started scrollto">Apply Now</a>
            </div>
          </div>
        </div>
    </section><!-- End Hero -->

    <section id="info" class="info">
        <div class="container" data-aos="fade-up">
            <div class="row gx-0">
                <div class="col-lg-6 d-flex flex-column justify-content-center" data-aos="fade-up" data-aos-delay="100">
                    <div class="content">
                        <h2>Welcome to eIDKenya</h2>
                        <h4>Your go-to platform for a seamless and efficient online ID application experience in Kenya! At eIDKenya, we understand the importance of a secure and accessible identity solution, and we're here to simplify the process for you.
                        </h4>
                        <p>
                        The Kenyan Identification Card (ID) is a crucial document, serving as proof of identity for accessing essential government services and participating in democratic processes. It plays a vital role in financial transactions, employment opportunities, and serves as a versatile legal document. 
                        </p>
                        <div class="text-center text-lg-start">
                            <a href="#" class="btn-read-more d-inline-flex align-items-center justify-content-center align-self-center">
                                <span>Read More</span>
                                <i class="bi bi-arrow-right"></i>
                            </a>
                        </div>
                    </div>
                </div>
                <div class="col-lg-6 d-flex align-items-center" data-aos="zoom-out" data-aos-delay="100">
                    <img src="assets/images/about/info.jpg" style="width:97% ; border-radius:10px;" class="img-fluid" alt="">
                </div>
            </div>
        </div>
    </section>

    <!-- ======= process ======= -->
    <section id="process" class="process">
      <div class="container">

        <div class="section-title">
          <h2>The application process</h2>
          <p>Embarking on your online ID application journey with eIDKenya is as simple as following these easy steps</p>
        </div>

        <div class="row">

          <div class="col-lg-4 mt-4 mt-lg-0">
            <div class="box">
              <span>01</span>
              <h4>Sign Up with Ease</h4>
              <p>Begin by signing up on eIDKenya</p>
            </div>
          </div>

          <div class="col-lg-4 mt-4 mt-lg-0">
            <div class="box">
              <span>02</span>
              <h4> Effortless Application Process</h4>
              <p>Fill in the necessary information correctly and upload the required documents</p>
            </div>
          </div>

          <div class="col-lg-4 mt-4 mt-lg-0">
            <div class="box">
              <span>03</span>
              <h4> Secure Online Payment</h4>
              <p>Complete the application process with our secure online payment system</p>
            </div>
          </div>

          <div class="col-lg-4 mt-4 mt-lg-0" style="margin-top:90%;">
            <div class="box">
              <span>04</span>
              <h4>  Schedule Your Appointment</h4>
              <p>Use our convenient appointment scheduling system to choose a time that suits your schedule for your visit to the designated processing center. </p>
            </div>
          </div>

          <div class="col-lg-4 mt-4 mt-lg-0">
            <div class="box">
              <span>05</span>
              <h4> Monitor Your Application</h4>
              <p>Stay informed every step of the way. Our application tracking feature lets you monitor the progress of your application—from submission to approval.</p>
            </div>
          </div>

          

        </div>

      </div>
    </section><!-- Process -->
</main>


@endsection