@extends('layouts.frontend.app')

@section('content')

<section class="about-page">
  <div class="conatiner-fluid about-inner">
    <div class="row about-row">
      <div class="about-heading">
        <h6>Contact Us</h6>
      </div>
    </div>
  </div>
</section>
<section class="contact">
  <h1 class="text-center">We are here to help</h1><br>
  <p>You can reach us through our contact us form or in case you want to speak with one of representatives feel free to call us 0207 205 2477 or 0208 <br>8941315. If calling from abroad please dial: +44 207 205 2477. Lines are open 9am – 8pm Mon-Sat.</p>
  
  <section class="contact-page-sec">
    <div class="container">
      <div class="row">
        <div class="col-md-3">
          <div class="contact-info">
            <div class="contact-info-item">
              <div class="contact-info-icon">
                <i class="fa fa-phone" aria-hidden="true"></i>
              </div>
              <div class="contact-info-text">
                <h2>Phone Number</h2>
                <span>(+44) 207 205 2477</a></span>
                <span>0208 894 1315</a></span>
              </div>
            </div>
          </div>
        </div>
        <div class="col-md-3">
          <div class="contact-info">
            <div class="contact-info-item">
              <div class="contact-info-icon">
                <i class="fa fa-envelope" aria-hidden="true"></i>
              </div>
              <div class="contact-info-text">
                <h2>E-mail</h2>
                <span>admin@alternativetoHRT.com</span>
                <!-- <span>(+44) 207 205 2477,0208 894 1315</span> -->
              </div>
            </div>
          </div>
        </div>
        <div class="col-md-3">
          <div class="contact-info">
            <div class="contact-info-item">
              <div class="contact-info-icon">
                <i class="fa fa-clock-o" aria-hidden="true"></i>
              </div>
              <div class="contact-info-text">
                <h2>Business Hours</h2>
                <span>Mon - Sat 9:00 AM - 8:00 PM</span>
              </div>
            </div>
          </div>
        </div>
        <div class="col-md-3">
          <div class="contact-info">
            <div class="contact-info-item">
              <div class="contact-info-icon">
                <i class="fa fa-map-marker" aria-hidden="true"></i>
              </div>
              <div class="contact-info-text">
                <h2>Address</h2>
                <span>Natural Juices & Vitamins Ltd.</span>
                <span>Braemar House 30 Kings Ave Sunbury On Thames Middlesex TW16 7QE</span>
              </div>
            </div>
          </div>
        </div>
      </div>
      <div class="row">
        <div class="col-md-8">
          <div class="contact-page-form" method="post">
            @if (Session::has('success'))
            <div class="alert alert-success">
              {{ Session::get('success') }}
            </div>
            @endif
            <h2>Send us a Message</h2>
            <p>Let us know how can we help you.</p>
            <form action="{{route('frontend.contactus.store')}}" enctype="multipart/form-data" method="post">
              @csrf
              <div class="row">
                <div class="col-md-6 col-sm-6 col-xs-12">
                  <div class="single-input-field">
                    <input type="text" placeholder="Your Name*" name="name" required />
                  </div>
                  @error('name')
                  <div class="error text-danger">{{ $message }}</div>
                  @enderror
                </div>
                <div class="col-md-6 col-sm-6 col-xs-12">
                  <div class="single-input-field">
                    <input type="email" placeholder="E-mail*" name="email" required/>
                  </div>
                  @error('email')
                  <div class="error text-danger">{{ $message }}</div>
                  @enderror
                </div>  
              
                <div class="col-md-12 message-input">
                  <div class="single-input-field">
                    <textarea placeholder="Write Your Message*" name="message" required></textarea>
                  </div>
                  @error('message')
                  <div class="error msg-up text-danger">{{ $message }}</div>
                  @enderror
                </div>
                <div class="single-input-fieldsbtn">
                  <input type="submit" value="Send Now" />
                </div>

              </div>
            </form>
          </div>
        </div>
        <div class="col-md-4">
          <div class="contact-page-map">
            <iframe width="520" height="400" frameborder="0" scrolling="no" marginheight="0" marginwidth="0" id="gmap_canvas" src="https://maps.google.com/maps?width=520&amp;height=400&amp;hl=en&amp;q=BRAEMAR%20HOUSE%2030%20KINGS%20AVE%20SUNBURY%20ON%20THAMES%20MIDDLESEX%20MIDDLESEX+(NATURAL%20JUICES%20&amp;%20VITAMINS%20LTD.)&amp;t=&amp;z=12&amp;ie=UTF8&amp;iwloc=B&amp;output=embed"></iframe>
          </div>
        </div>
      </div>
    </div>
  </section>
</section>

@endsection