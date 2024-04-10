@extends('layouts.main')
@section('pageTitle', 'Contact')
@section('content')



<main id="main">

    <!-- ======= Contact Section ======= -->
    <section class="breadcrumbs">
      <div class="container">

        <div class="d-flex justify-content-between align-items-center">
          <h2>Contact</h2>
          <ol>
            <li><a href="{{ route ('home') }}">Home</a></li>
            <li>Contact</li>
          </ol>
        </div>

      </div>
    </section><!-- End Contact Section -->

    <!-- ======= Contact Section ======= -->
    <section class="contact" data-aos="fade-up" data-aos-easing="ease-in-out" data-aos-duration="500">
    <div class="container">

        <div class="row">

        <div class="col-lg-6">

            <div class="row">
            <div class="col-md-12">
                <div class="info-box">
                <i class="bx bx-map"></i>
                <h3>Our Address</h3>
                <p>P.O BOX 47716-00100 NAIROBI GPO</p>
                </div>
            </div>
            <div class="col-md-6">
                <div class="info-box">
                <i class="bx bx-envelope"></i>
                <h3>Email Us</h3>
                <p>contact@eidkenya.com<br>eidkenya@gmail.com</p>
                </div>
            </div>
            <div class="col-md-6">
                <div class="info-box">
                <i class="bx bx-phone-call"></i>
                <h3>Call Us</h3>
                <p>0743316661<br>0701201221</p>
                </div>
            </div>
            </div>

        </div>

        <div class="col-lg-6">
            <form action="{{ route('contact.send') }}" method="post" role="form" class="php-email-form">
                @csrf
                <div class="row">
                    <div class="col-md-6 form-group">
                    <input type="text" name="name" class="form-control" id="name" placeholder="Your Name" required>
                    </div>
                    <div class="col-md-6 form-group mt-3 mt-md-0">
                    <input type="email" class="form-control" name="email" id="email" placeholder="Your Email" required>
                    </div>
                </div>
                <div class="form-group mt-3">
                    <input type="text" class="form-control" name="subject" id="subject" placeholder="Subject" required>
                </div>
                <div class="form-group mt-3">
                    <textarea class="form-control" name="message" rows="5" placeholder="Message" required></textarea>
                </div>
                <div class="my-3">
                    <div class="loading">Loading</div>
                    <div class="error-message"></div>
                    <div class="sent-message">Your message has been sent. Thank you!</div>
                </div>
                <div class="text-center"><button type="submit">Send Message</button></div>
            </form>
        </div>

        </div>

    </div>
    </section><!-- End Contact Section -->

</main><!-- End #main -->


@endsection