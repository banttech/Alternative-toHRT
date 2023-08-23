@extends('layouts.frontend.app')

@section('content')
<style>
  button.btn.btn-success.select-button {
    margin-top: 2px;
    margin-right: 10px;
    padding: 7px 18px;
    font-size: 17px;
  }
</style>

<section class="carousel">
  <div id="carouselExampleControls" class="carousel slide" data-ride="carousel">
    <div class="carousel-inner">
      <div class="carousel-item active">
        <img src="{{ asset('frontend_assets/assets/image/1.png')}}" class="d-block w-100" alt="...">
      </div>
      <div class="carousel-item">
        <img src="{{ asset('frontend_assets/assets/image/3.png')}}" class="d-block w-100" alt="...">
      </div>
    </div>
    <button class="carousel-control-prev" type="button" data-target="#carouselExampleControls" data-slide="prev">
      <span class="carousel-control-prev-icon" aria-hidden="true"></span>
      <span class="sr-only">Previous</span>
    </button>
    <button class="carousel-control-next" type="button" data-target="#carouselExampleControls" data-slide="next">
      <span class="carousel-control-next-icon" aria-hidden="true"></span>
      <span class="sr-only">Next</span>
    </button>
  </div>
</section>

<section class="quality-section">
  <div class="container">
    <div class="row">
      <div class="col-md-4">
        <div class="innerqualty-card" data-aos="fade-right" data-aos-duration="2000">
         
          <img src="{{ asset('frontend_assets/assets/image/best-seller.png')}}" alt="">
          <h6>PREMIUM QUALITY</h6>
          <p>We ensure a super quality supplement that actually works. Our team tests and verifies the products at multiple stages of development and packaging to ensure each bottle reaches the customer's doorstep with top notch quality.</p>
        </div>
      </div>
      <div class="col-md-4">
        <div class="innerqualty-card" data-aos="fade-down" data-aos-duration="2000">
        
          <img src="{{ asset('frontend_assets/assets/image/product-supply.png')}}" alt="">
          <h6>FREE UK DELIVERY</h6>
          <p>We provide FREE and QUICK delivery in the United Kingdom. Additionally you will get SAME DAY DISPATCH if your order is placed before 2PM UK time. We also serve European countries with a flat fee. On public holidays orders are usually shipped on the next working day. </p>
        </div>
      </div>
      <div class="col-md-4">
        <div class="innerqualty-card" data-aos="fade-left" data-aos-duration="2000">
          <img src="{{ asset('frontend_assets/assets/image/worldwide.png')}}" alt="">
          <h6>60 CAPSULES - 2 MONTHS SUPPLY</h6>
          <p>Our Natural Herbal Alternative to HRT consist of 60 capsules that are extracted from 7 Key menopause herbs. One capsule per day will lead you to 2 months of supply.	</p>
        </div>
      </div>
    </div>
  </div>
</section>

<section class="about-section">
  <div class="container">
    <div class="row">
      <div class="col-lg-6 col-md-6 col-sm-12 col-12">
        <div class="card-body">
          <h5 class="card-title text-success">Introducing Natural Herbal Alternative to HRT</h5>
          <h1 class="card-title">SUPPORTING WOMEN</h1>
          <h1 class="card-title">THROUGH MENOPAUSE</h1>
          <p>The very first sign or symptom of menopause is the change in the pattern of your regular periods. Hot
            flushes, anxiety, night sweats, memory issues, vaginal dryness or changes in sex drive are other symptoms of
            menopause. Sometimes these symptoms vary among individuals.</p>
          <p>We have introduced Natural Herbal Alternative to HRT to ensure a significant reduction in menopause
            symptoms without HRT.</p>
        </div>
      </div>
      <div class="col-lg-6 col-md-6 col-sm-12 col-12 about-img">
        <img src="{{ asset('frontend_assets/assets/image/about-pic.webp')}}" alt="">
      </div>
    </div>
    <div class="row about-center">
      <div class=" col-md-4 inhath">
        <div class="progress-box-layout1">
          <h1>97%</h1>
          <p>Effective during Hot Flashes</p>
        </div>
      </div>
      <div class=" col-md-4 inhath">
        <div class="progress-box-layout1">
          <h1>100%</h1>
          <p>Tested and Confirmed</p>
        </div>
      </div>
      <div class=" col-md-4">
        <div class="progress-box-layout2">
          <h1>0%</h1>
          <p>Side Effects - Worry Less</p>
        </div>
      </div>
    </div>
  </div>
</section>


<section class="supplement">
  <h5 class="text-center text-success">Supplements That Make Sense</h5>
  <h1>Contains 7 Key menopause herbs that help to</h1>
  <h1>relieve many menopause symptoms</h1>
  <p>Stay Cool, Calm and Comfortable Day and Night with Natural Herbal Alternative To Taking HRT</p>
  <div class="container">
    <div class="row new-row">
      <div class="col-md-3">
        <div class="sec-new-card-1">
          <img src="{{ asset('frontend_assets/assets/image/Custom-1.webp')}}" alt="">
          <div class="sec-new-body-1">
            <h3>SOY ISOFLAVONES</h3>
            <p>Benefits most menopause symptoms, especially hot flushes. Substantial evidence supports the effectiveness of Soy constituents for reducing menopausal hot flushes.</p>
          </div>
        </div>
      </div>
      <div class="col-md-3">
        <div class="sec-new-card-1">
          <img src="{{ asset('frontend_assets/assets/image/Custom-2.webp')}}" alt="">
          <div class="sec-new-body-1">
            <h3>RED CLOVER (TRIFOLIUM PRATENSE)</h3>
            <p>Most menopause symptoms reduced, especially hot flushes, mood swings plus studies show a more positive outlook and increased energy levels.</p>
          </div>
        </div>
      </div>
      <div class="col-md-3">
        <div class="sec-new-card-1">
          <img src="{{ asset('frontend_assets/assets/image/Custom-3.webp')}}" alt="">
          <div class="sec-new-body-1">
            <h3>SAGE</h3>
            <p>Sage has high levels of antioxidants and anti-inflammatory properties. It has a long history as a herbal remedy for many conditions, but it hasn’t been studied extensively for menopause.</p>
          </div>
        </div>
      </div>
      <div class="col-md-3">
        <div class="sec-new-card-1">
          <img src="{{ asset('frontend_assets/assets/image/Custom-dimensions-200x200-px-4.webp')}}" alt="">
          <div class="sec-new-body-1">
            <h3>AGNUS CASTUS (VITEX AGNUS CASTUS)</h3>
            <p>Especially beneficial for hot flushes and night sweats. Agnus Castus has been shown to decrease levels of follicle stimulating hormone (FSH).</p>
          </div>
        </div>
      </div>
    </div>
    <div class="row row-two">
     
      <div class="col-md-3">
        <div class="sec-new-card-1">
          <img src="{{ asset('frontend_assets/assets/image/Custom-dimensions-200x200-px-6.webp')}}" alt="">
          <div class="sec-new-body-1">
            <h3>WILD YAM (DIOSCOREA VILLOSA) </h3>
            <p>Research indicates that Wild Yam also has an antioxidant action that prevents breakdown of fatty molecules in the body and increases beneficial levels of HDL ("Good") cholesterol.</p>
          </div>
        </div>
      </div>
      <div class="col-md-3">
        <div class="sec-new-card-1">
          <img src="{{ asset('frontend_assets/assets/image/Custom-dimensions-200x200-px-7.webp')}}" alt="">
          <div class="sec-new-body-1">
            <h3>DONG QUAI (ANGELICA SINENSIS)</h3>
            <p>Benefits: Hot flushes, vaginal dryness, mood balance. Notes: Dong Quai is native to China and Japan where it is widely used as a female tonic. Sometimes referred to as a "female ginseng".</p>
          </div>
        </div>
      </div>
      <div class="col-md-3">
        <div class="sec-new-card-1">
          <img src="{{ asset('frontend_assets/assets/image/Custom-dimensions-200x200-px-8.webp')}}" alt="">
          <div class="sec-new-body-1">
            <h3>Hops</h3>
            <p>Now, scientists have discovered that the hops plant contains the most powerful phytoestrogen ever identified. It naturally and safely restore well-being to women during their menopausal years and beyond.</p>
          </div>
        </div>
      </div>
      
    </div>
  </div>
</section>


<section class="product-section">
  <div class="container">
    <div class="text">
      <h5>Product Benefits</h5>
      <h1>Significant Reduction In Menopause Symptoms</h1>
      <p>Naturaljuices’s – “Natural Alternative to HRT” consists of 7 essential menopause herbs that provide quick
        relief from all primary symptoms of menopause. Natural Herbal Alternatives to HRT reduce symptoms with no side
        effects & long term risks that are involved in pharmaceutical HRT.</p>
      <p>Our customers have noticed a significant drop in menopause symptoms within 30 days of use. Natural Herbal
        Alternatives to HRT come with 60 capsules that are 2 months of supply. </p>
    </div>
    <div class="product">
      <div class="row">
        <div class="col-lg-3 col-md-3 col-sm-12 col-12 ">
          <div class="inner-img">
            <img src="{{ asset('frontend_assets/assets/image/4.png')}}" alt="">
          </div>
          <div class="product-inner">
            <h6>100% Pure Herbal and Natural Solution</h6>
          </div>

        </div>
        <div class="col-lg-3 col-md-3 col-sm-12 col-12 ">
          <div class="inner-img">
            <img src="{{ asset('frontend_assets/assets/image/5.png')}}" alt="">
          </div>
          <div class="product-inner">
            <h6>No More Sleep Disturbances and Tiredness</h6>
          </div>
        </div>
        <div class="col-lg-3 col-md-3 col-sm-12 col-12 ">
          <div class="inner-img">
            <img src="{{ asset('frontend_assets/assets/image/6.png')}}" alt="">
          </div>
          <div class="product-inner">
            <h6>Provides a Significant from Hot Flushes</h6>
          </div>
        </div>
        <div class="col-lg-3 col-md-3 col-sm-12 col-12 ">
          <div class="inner-img">
            <img src="{{ asset('frontend_assets/assets/image/7.png')}}" alt="">
          </div>
          <div class="product-inner">
            <h6>GM Free, Suitable for Vegans</h6>
          </div>
        </div>
        <div class="col-lg-3 col-md-3 col-sm-12 col-12 ">
          <div class="inner-img">
            <img src="{{ asset('frontend_assets/assets/image/8.png')}}" alt="">
          </div>
          <div class="product-inner">
            <h6>Get Rid of Night Sweats & Mood Swings</h6>
          </div>

        </div>
        <div class="col-lg-3 col-md-3 col-sm-12 col-12 ">
          <div class="inner-img">
            <img src="{{ asset('frontend_assets/assets/image/9.png')}}" alt="">
          </div>
          <div class="product-inner">
            <h6>Support for all Stages of the Menopause</h6>
          </div>

        </div>
        <div class="col-lg-3 col-md-3 col-sm-12 col-12 ">
          <div class="inner-img">
            <img src="{{ asset('frontend_assets/assets/image/10.png')}}" alt="">
          </div>
          <div class="product-inner">
            <h6>Helps During Irritability & Headaches</h6>
          </div>

        </div>
        <div class="col-lg-3 col-md-3 col-sm-12 col-12 ">
          <div class="inner-img">
            <img src="{{ asset('frontend_assets/assets/image/11.png')}}" alt="">
          </div>
          <div class="product-inner">
            <h6>Major Relief from Depression and Anxiety</h6>
          </div>

        </div>
      </div>
    </div>
</section>

<section class="stay-cool">
  <div class="container-fluid">
    <div class="row">
      <div class="cool-inner">
        @php
        $product = App\Models\Product::where('id', 4)->first();
        $sellPrice = $product->price;
        $singleProductPrice = $product->price / 4;
        @endphp
        <h2>Stay Cool, Calm & Comfortable Day and Night. <br> Get Super Saving Pack – Only £{{
          number_format($singleProductPrice, 2) }}/Bottle When Purchase Pack of 4 Bottles</h2>
        <a href="{{route('frontend.product',$product->slug)}}"><button type="button" class=" btn-1btn-success">Get Your
            Pack of 4 Bottles - As Low As £{{ number_format($sellPrice, 2) }}</button></a>
      </div>
    </div>
  </div>
</section>

<section class="quality">
  <div class="container">
    <div class="quality-inner">
      <h5>Suitable of Vegetarian | BPA Free Bottles | Dietary Supplements</h5>
      <h1>Scientifically Proven Quality Products</h1>
    </div>
    <div class="row">
      <div class="col-lg-6 col-md-6 col-sm-12 col-12">
        <div class="main-quality">

          <div class="row">
            <div class="col-md-3">
              <img src="{{ asset('frontend_assets/assets/image/quality1.png')}}" alt="">
            </div>
            <div class="col-md-9">
              <h5>60 Capsules</h5>
              <p>Get pack of 60 Capsules that will be equivalent to 2 months supply.</p>
            </div>
          </div>
          <div class="row">
            <div class="col-md-3">
              <img src="{{ asset('frontend_assets/assets/image/quality2.png')}}" alt="">
            </div>
            <div class="col-md-9">
              <h5>Original High Potency Formula</h5>
              <p>A natural dietary alternative to taking HRT contains proven original high potency formula that shows
                positive results in less than 30 days.</p>
            </div>
          </div>
          <div class="row">
            <div class="col-md-3">
              <img src="{{ asset('frontend_assets/assets/image/quality3.png')}}" alt="">
            </div>
            <div class="col-md-9">
              <h5>Suitable for Vegetarians</h5>
              <p>Natural Herbal Alternative to Taking HRT is suitable if you are on vegetarians diet.</p>
            </div>
          </div>
        </div>
      </div>
      <div class="col-lg-6 col-md-6 col-sm-12 col-12">
        <div class="quality-side">
          <p> Our products contain high-quality herbal ingredients that are carefully selected to support women in
            menopause. Our product reduces menopause symptoms by giving you the vitamins and mineral your body now needs
            the most.</p>

        </div>
      </div>
    </div>
  </div>
</section>

<section class="review">
  <div class="container">
    <div class="review-inner">
      <h1>Real Customers Real Results</h1>
      <div id="carouselContent" class="carousel slide" data-ride="carousel">
        <div class="carousel-inner" role="listbox">
          @php
          $value = 0;

          @endphp
          @foreach($success_stories as $key => $success_storie)

          @if($value===0)
          <div class="carousel-item active text-center p-4 review-pra" id="carousel-arrow">
            @else
            <div class="carousel-item  text-center p-4 review-pra">
              @endif
              @php
              $value = 1;

              @endphp
              <p>{!! $success_storie->description !!}</p>
              <p>{{$success_storie->name}}</p>

            </div>
            @endforeach

          </div>
          <a class="carousel-control-prev" href="#carouselContent" role="button" data-slide="prev">
            <span class="carousel-control-prev-icon" aria-hidden="true"></span>
            <span class="sr-only">Previous</span>
          </a>
          <a class="carousel-control-next" href="#carouselContent" role="button" data-slide="next">
            <span class="carousel-control-next-icon" aria-hidden="true"></span>
            <span class="sr-only">Next</span>
          </a>
        </div>
      </div>
    </div>
</section>


<section class="section-service">
  <div class="container">
    <div class="our-service">
      <h5>Order Now</h5>
      <h1>Our Money Saving Packs</h1>
    </div>
    <div class="owl-slider">
      <div id="carousel" class="owl-carousel">
        @foreach($products as $key => $product)
        <div class="item">
          <div class="service-card">
            <img src="{{asset('admin_assets/images/'.$product->image)}}" alt="1000X1000">
            <h6><a href="{{route('frontend.product',$product->slug)}}">{{$product->productname}}</a></h6>
            @php
            $productCategory = DB::table('productcategory')->where('id',$product->product_category_id)->first();
            @endphp
            <p><a
                href="{{route('frontend.product.category', $productCategory->slug)}}">{{$productCategory->categoryname}}</a>
            </p>
            @if($product->id == 1)
            @php
            $firstProductPrice = App\Models\Product::where('id',1)->first()->price;
            $fourthProductPrice = App\Models\Product::where('id',4)->first()->price;
            @endphp
            <h6>£{{ $firstProductPrice }} - £{{ $fourthProductPrice }}</h6>
            <a href="{{route('frontend.product',$product->slug)}}"><button type="button"
                class="btn btn-success select-button">Select Options</button></a>
            @else
            <h6>£{{$product->price}}</h6>
            <button
              onclick="addToCart('{{ $product->id }}', '{{ $product->productname }}', '{{ $product->price }}', '{{ $product->image }}', '1')"><a><i
                  class="fa fa-shopping-cart" aria-hidden="true"></i> Add To Cart</a></button>
            @endif
          </div>
        </div>
        @endforeach
      </div>
    </div>
</section>


<section class="blog">
  <h1> Wellness Blog</h1>
  <section class="posts-listing">
    @foreach($wellness_blogs as $key => $wellness_blog)

    @php
    $category = DB::table('blogcategory')->where('id',$wellness_blog->category_id)->first();
    @endphp

    @php
    $blogLength = Str::length($wellness_blog->description);

    @endphp
    <article class="post-item">


      <div class="post-item__thumbnail-wrapper">
        <div class="post-item__thumbnail"
          style="background-image:url({{asset('admin_assets/images/'.$wellness_blog->image)}});"></div>
      </div>

      <div class="post-item__content-wrapper">
        <div class="blog-text">

          <h2> <a class="post-item__inner"
              href="{{ route('frontend.blogpage', $wellness_blog->slug) }}">{{$wellness_blog->title,0,50}}</a></h2>


        </div>
        <div class="post-item__metas">
          <time class="post-item__meta post-item__meta--date"><i class="fa fa-calendar" aria-hidden="true"></i>
            {{date('F d, Y', strtotime($wellness_blog->date))}}</time>
          <p class="post-item__meta post-item__meta--category">/ &nbsp; <i class="fa fa-user-o" aria-hidden="true"></i>
            BY : <a href="{{route('frontend.author', $wellness_blog->name)}}">{{$wellness_blog->name}}</a></p>
          <p class="post-item__meta post-item__meta--category">Category : <a
              href="{{route('frontend.blogcategory', $category->slug)}}">{{$category->categoryname}}</a></p>
        </div>
        @php
        $wBlogDec=strip_tags(htmlspecialchars_decode( $wellness_blog->description));
        @endphp
        <div class="post-item__excerpt">{{ str::limit($wBlogDec, 120) }}</div>

        <div class="post-item__read-more-wrapper">
          <p class="post-item__read-more"> <a class="post-item__inner"
              href="{{ route('frontend.blogpage', $wellness_blog->slug) }}">Read more</a></p>
        </div>


      </div>

    </article>
    @endforeach

  </section>
</section>
@include('frontend.modals.cartModal')
@endsection