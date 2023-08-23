@extends('layouts.frontend.app')

@section('content')

<section class="about-page">
    <div class="conatiner-fluid about-inner">
        <div class="row about-row">
                <div  class="about-heading">
                    <h6>About Us</h6>
                </div>
        </div>
    </div>
</section>
<section class="about-second">
 .   <div class="container-fluid">
    <div class="row">
        <div class="herbal-inner">
            <h2>Dietary Herbal Supplements to replace conventional HRT</h2>
            <p>Welcome to Alternative To HRT – A micro-website from Natural Juices & Vitamins Ltd. to introduce Dietary Herbal Supplements to replace conventional HRT. </p>
            <p>This unique and effective solution to women’s menopause contains top-notch quality concentrated extracts of seven key menopause herbs that provide quick relief from ALL the significant menopause symptoms. </p>
            <p>Natural Herbal Alternative to Taking HRT is specially cultivated & packed for Natural Juices and Vitamins Ltd. We ensure 100% purity and quality of our product that is positively reflected in our customer’s feedback. </p>
        </div>
        
    </div>
 </div>
</section>
<section>
    <div class="herbal-img">
        <img src="{{ asset('frontend_assets/assets/image/2.png')}}" alt="">
    </div>
</section>

<section class="quality-section">
    <div class="container">
      <div class="row">
        <div class="col-md-4">
          <div class="innerqualty-card">
            <img src="{{ asset('frontend_assets/assets/image/worldwide.png')}}" alt="">
            <h6> Free Shipping</h6>
            <p>We provide FREE and QUICK delivery in the United Kingdom. Additionally you will get SAME DAY DELIVERY* if order is placed before 2PM UK time. We also serve European countries with a flat fee. On public holidays orders are usually shipped on the next working day.</p>
          </div>
        </div>
        <div class="col-md-4">
          <div class="innerqualty-card">
            <img src="{{ asset('frontend_assets/assets/image/about-1 (1).png')}}" alt="">
            <h6>Secure Payments </h6>
            <p>We ensure secure payments and keep customers' data completely encrypted and hidden. Customers can use their PayPal account or credit card/debit card to make online payments. The whole process of making online payments is completely encrypted and secure.</p>
          </div>
        </div>
        <div class="col-md-4">
          <div class="innerqualty-card">
            <img src="{{ asset('frontend_assets/assets/image/about-1 (3).png')}}" alt="">
            <h6>Support Customer</h6>
            <p>You can reach us through our contact us form or in case you want to speak with one of representatives feel free to call us 0207 205 2477 or 0208 8941315. If calling from abroad please dial: +44 207 205 2477. Lines are open 9am – 8pm Mon-Sat.</p>
          </div>
        </div>
      </div>
    </div>
  </section>


  <section class="transparent">
    <div class="container">
      <h3>Are you ready to get relief from Hot Flushes & Night Sweats?</h3>
      <p> Order Now </p>
      <a href="{{route('frontend.shop')}}"><i class="fa fa-phone icon-green" aria-hidden="true" style="color: green;"></i></a>
    </div>
  </section>

  @endsection