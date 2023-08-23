@extends('layouts.frontend.app')

@section('content')

<style>
  .product_name {
    position: relative !important;
    color: #fff;
  }

  .product_name:hover {
    color: #fff;
  }

  .snip1418 h3 {
    font-size: 14px !important;
    text-align: center;
  }
</style>

<section class="about-page">
  <div class="conatiner-fluid about-inner">
    <div class="row about-row">
      <div class="about-heading">
        @if(request()->search)
        <h6>Search Results for "{{ request()->search }}"</h6>
        @else
        <h6>Shop</h6>
        @endif
      </div>
    </div>
  </div>
</section>

<section class="card-sec-shop">
  <div class="container">
    <div class="row">

      <div class="col-md-3">
        <div class="side-bar-sec">
          <h2 class="new-head-sidebar">Product Categories</h2>
          <ul>
            @foreach($productCategorys as $key => $productCategory)   
            
            @php
              $products = DB::table('product')->where('product_category_id',$productCategory->id)->get();
              $productQuantity = count($products); 
              
              @endphp
              <li>
                <i class="fa fa-dot-circle-o" aria-hidden="true"></i>
                <a href="{{route('frontend.product.category', $productCategory->slug)}}">{{$productCategory->categoryname}}</a>
                <span>
                  ({{$productQuantity}})
                </span>
              </li>
            @endforeach
            
            
          </ul>
        </div>
        <div class="side-bar-tag">
          <h2 class="new-tag-sidebar">Product Tags</h2>
          <div class="tag-sec-2">
            @php
             $products = DB::table('product')->orderBy('id', 'asc')->where('status','Active')->get();
              $alltags = '';
            @endphp
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
              {{-- @php
              echo $result;
                 
              @endphp
                --}}
                <a href="{{ route('frontend.product.tag', $result) }}">{{$result}}</a>
              @endif
            @endforeach
          </div>
        </div>
      </div>

      <div class="col-md-9">
        <div class="row row-new-sec-shop">
          @include('frontend.shop.shopProducts')
        </div>
      </div>


    </div>
  </div>
</section>


<div>
  {{-- <div class="tags"> --}}

    {{-- @foreach($tags as $key => $tag)
    <a href="{{ route('frontend.product.tag', $tag->tags) }}">{{ $tag->tags }}</a>
    @if(!$loop->last)
    ,
    @endif
    @endforeach --}}


    {{-- <section class="shop-second">
      <div class="container">
        <div class="row" id="shop-products">
          @include('frontend.shop.shopProducts')
        </div>
      </div>
    </section> --}}

    @if (Session::has('success'))
    <div class="alert alert-dark">
      {{ Session::get('success') }}
    </div>
    @endif
    {{-- <div class="blog_content right_content">

      <div class="columns categories">
        <span class="title blog-categories">Categories</span>
        <section>
          @foreach($productCategorys as $key => $productCategory)
          <a href="{{route('frontend.blogcategory', $productCategory->slug)}}">{{$productCategory->categoryname}}</a>
          @endforeach
        </section>
      </div>
    </div> --}}



    {{--
  </div> --}}
</div>
@include('frontend.modals.cartModal')
@endsection