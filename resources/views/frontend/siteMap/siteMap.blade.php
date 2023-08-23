@extends('layouts.frontend.app')

@section('content')

<section class="about-page">
    <div class="conatiner-fluid about-inner">
        <div class="row about-row">
            <div class="about-heading">
                <h6>Navigation To Website</h6>
            </div>
        </div>
    </div>
</section>
<section class="site-map">
    <div class="container">
    <div class="row">
        <div class="col-md-12">
            <div class="map-inner">
            <h1>Pages</h1>
            <div class="pb-10 border-new-sitemap">
            <div class="row">
                <div class="col-md-6">
                    <ul>
                        <li><i class="fa fa-check-square-o" aria-hidden="true"></i><a href="{{route('frontend.home')}}">Home</a></li>
                        <li><i class="fa fa-check-square-o" aria-hidden="true"></i><a href="{{route('frontend.aboutus')}}">About Us</a></li>
                        <li><i class="fa fa-check-square-o" aria-hidden="true"></i><a href="{{route('frontend.shop')}}">Shop</a></li>
                        <li><i class="fa fa-check-square-o" aria-hidden="true"></i><a href="{{route('frontend.blog')}}">Wellness Blog</a></li>
                        <li><i class="fa fa-check-square-o" aria-hidden="true"></i><a href="{{route('frontend.contactus')}}">Contact Us</a></li>
                        <li><i class="fa fa-check-square-o" aria-hidden="true"></i><a href="{{route('frontend.privacy-policy')}}">Privacy Policy</a></li>
                    </ul>
                </div>
                <div class="col-md-6">
                    <ul>
                        <li><i class="fa fa-check-square-o" aria-hidden="true"></i><a href="{{route('frontend.terms-conditions')}}">Terms & Conditions</a></li>
                        <li><i class="fa fa-check-square-o" aria-hidden="true"></i><a href="{{route('cart.index')}}">Cart</a></li>
                        <li><i class="fa fa-check-square-o" aria-hidden="true"></i><a href="{{route('checkout.index')}}">Checkout</a></li>
                        <li><i class="fa fa-check-square-o" aria-hidden="true"></i><a href="{{route('frontend.userdashboard')}}">My Account</a></li>
                        @if(Auth::check())
                        <li><i class="fa fa-check-square-o" aria-hidden="true"></i><a href="{{route('frontend.userwishlist')}}">Wishlist</a></li>
                        @else
                        <li><i class="fa fa-check-square-o" aria-hidden="true"></i><a href="{{route('frontend.login')}}">Wishlist</a></li>
                        @endif
                    </ul>
                </div>
            </div>
        </div>
            <h1>Posts</h1>
            <ul>
                @foreach($wellnessBlogs as $key => $wellnessBlog)
                <li><i class="fa fa-check-square-o" aria-hidden="true"></i><a href="{{ route('frontend.blogpage', $wellnessBlog->slug) }}">{{$wellnessBlog->title}}</a></li>
                @endforeach
            </ul>
            <h1>Categories</h1>
            <ul>
                @foreach($blogCategorys as $key => $blogCategory)
                <li><i class="fa fa-check-square-o" aria-hidden="true"></i><a
                        href="{{ route('frontend.blogcategory', $blogCategory->slug) }}">{{$blogCategory->categoryname}}</a>
                </li>
                @endforeach
            </ul>
            <div class="b-10 border-new-sitemap">
            <ul>
                @php
                $alltags = '';
                @endphp

                <h1>Tags</h1>
                @foreach($wellnessBlogs as $key => $blogTag)
                @php
                $alltags = $alltags . "," . $blogTag->tags;
                @endphp
                @endforeach
                @php

                $tagarr = explode(',',$alltags);

                $results = array_unique( $tagarr, SORT_REGULAR);
                // dd($result);
                @endphp
                @foreach($results as $key => $result)
                @if($result!="")

                <li><i class="fa fa-check-square-o" aria-hidden="true"></i><a href="{{ route('frontend.blog.tag', $result) }}">{{ucfirst($result)}}</a></li>
                @endif
                @endforeach

            </ul>
            </div>
            <h1>Products</h1>
            <ul>
                @foreach($products as $key => $product)
                <li><i class="fa fa-check-square-o" aria-hidden="true"></i><a href="{{route('frontend.product',$product->slug)}}">{{$product->productname}}</a></li>
                @endforeach
            </ul>
            <h1>Product categories</h1>
            <ul>
                @foreach($productCategorys as $key => $productCategory)
                <li>
                    <i class="fa fa-check-square-o" aria-hidden="true"></i>
                    <a
                        href="{{ route('frontend.product.category', $productCategory->slug) }}">{{$productCategory->categoryname}}</a>
                </li>
                @endforeach
            </ul>
            <ul>
                @php
                $alltags = '';
                @endphp

                <h1>Product Tags</h1>
                @foreach($products as $key => $product)
                @php
                $alltags = $alltags . "," . $product->tags;
                @endphp
                @endforeach
                @php

                $tagarr = explode(',',$alltags);

                $results = array_unique( $tagarr, SORT_REGULAR);
                // dd($result);
                @endphp
                @foreach($results as $key => $result)
                @if($result!="")

                <li><i class="fa fa-check-square-o" aria-hidden="true"></i><a href="{{ route('frontend.product.tag', $result) }}">{{ucfirst($result)}}</a></li>
                @endif
                @endforeach

            </ul>

        </div>
    </div>
    </div>
</div>
</section>


@endsection









