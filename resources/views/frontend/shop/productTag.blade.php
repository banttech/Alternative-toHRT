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

        <h6>{{ucwords($results)}}</h6>

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
            <li>
              <i class="fa fa-dot-circle-o" aria-hidden="true"></i>
              <a
                href="{{route('frontend.product.category', $productCategory->slug)}}">{{$productCategory->categoryname}}</a>
              @php
              $products = DB::table('product')->where('product_category_id',$productCategory->id)->get();
              $productQuantity = count($products);

              @endphp
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
            $alltags = '';
            @endphp
            @foreach( $allTags as $key => $allproduct)
            @php
            $alltags = $alltags . "," . $allproduct->tags;
            @endphp
            @endforeach
            @php

            $tagarr = explode(',',$alltags);

            $results = array_unique( $tagarr, SORT_REGULAR);
            // dd($result);
            @endphp
            @foreach($results as $key => $result)
            @if($result!="")

            <a href="{{ route('frontend.product.tag', $result) }}">{{$result}}</a>
            @endif
            @endforeach
          </div>
        </div>
      </div>

      <div class="col-md-9">
        <div class="row">


          @if(count($allProducts) > 0)
          @foreach($allProducts as $key => $product)
          @php
          $blogLength = Str::length($product->description);
          $productDescription=strip_tags(htmlspecialchars_decode( $product->description));
          @endphp
          <div class="col-md-4">
            <div class="cards">
              <div class="img"><img src="{{asset('admin_assets/images/'.$product->image)}}" alt="sample85" /></div>
              <div class="content">
                <h3><a href="{{route('frontend.product',$product->slug)}}"
                    class="product_name">{{$product->productname}}</a></h3>
                    @if($blogLength>120)
                    <p>{{ str::limit($productDescription,120).'...' }}</p>
                    @else
                    <p>{{ str::limit($productDescription,120) }}</p>
                    @endif
                @if($product->id == 1)
                @php
                $firstProductPrice = App\Models\Product::where('id',1)->first()->price;
                $fourthProductPrice = App\Models\Product::where('id',4)->first()->price;
                @endphp
                <span>
                  £{{ $firstProductPrice }} - £{{ $fourthProductPrice }}

                </span>
                @else
                <span>
                  <del style="color: grey; font-size:18px;">£{{$product->reg_sel_price}}</del>&nbsp;  £{{$product->price}}
                </span>
                @endif


                @if(Auth::check())
                @php
                $wishlists = DB::table('wish_list')->where('user_id',
                Auth::user()->id)->where('product_id',$product->id)->first();
                $totalWishlistItems = DB::table('wish_list')->where('user_id', Auth::user()->id)->get();
                @endphp


                @php
                $pid = $product->id;
                @endphp

                @if($product->id == 1)
                <a href="{{route('frontend.product',$product->slug)}}"
                  style="position: relative; color: #fff; text-decoration: none;">
                  <button>Select Options</button>
                </a>

                @if(!$wishlists)
                <h1 id={{"blackHeartIcon_".$pid}}>
                  <a onclick="addToWishList('{{ $product->id }}')"
                    style="position: relative; color: #fff; text-decoration: none; cursor: pointer;">
                    <i class="fa fa-heart-o wishlistHeart" style="font-size:22px;color:black"
                      title="Add to Wishlist"></i>
                  </a>
                </h1>
                <h1 id={{"redHeartIcon_".$pid}} style="display:none;"><a onclick="openWishListModel()"
                    style="cursor: pointer;"><i class="fa fa-heart-o" style="font-size:22px;color:red"></i></a></h1>
                @else
                <h1 id={{"redHeartIcon_".$pid}}><a onclick="openWishListModel()" style="cursor: pointer;"><i
                      class="fa fa-heart-o" style="font-size:22px;color:red"></i></a></h1>
                @endif

                @else
                <a onclick="addToCart('{{ $product->id }}', '{{ $product->productname }}', '{{ $product->price }}', '{{ $product->image }}', '1')"
                  style="position: relative; color: #fff; text-decoration: none; cursor: pointer;">
                  <button>Add to Cart</button>
                </a>

                @if(!$wishlists)
                <h1 id={{"blackHeartIcon_".$pid}}>
                  <a onclick="addToWishList('{{ $product->id }}')"
                    style="position: relative; color: #fff; text-decoration: none; cursor: pointer;">
                    <i class="fa fa-heart-o wishlistHeart" style="font-size:22px;color:black"
                      title="Add to Wishlist"></i>
                  </a>
                </h1>
                <h1 id={{"redHeartIcon_".$pid}} style="display:none;"><a onclick="openWishListModel()"
                    style="cursor: pointer;"><i class="fa fa-heart-o" style="font-size:22px;color:red"></i></a></h1>
                @else
                <h1 id={{"redHeartIcon_".$pid}}><a onclick="openWishListModel()" style="cursor: pointer;"><i
                      class="fa fa-heart-o" style="font-size:22px;color:red"></i></a></h1>
                @endif
                @endif
                @else
                @if($product->id == 1)
                <a href="{{route('frontend.product',$product->slug)}}"
                  style="position: relative; color: #fff; text-decoration: none;">
                  <button>Select Options</button>
                </a>
                @else
                <a onclick="addToCart('{{ $product->id }}', '{{ $product->productname }}', '{{ $product->price }}', '{{ $product->image }}', '1')"
                  style="position: relative; color: #fff; text-decoration: none; cursor: pointer;">
                  <button>Add to Cart</button>
                </a>
                @endif
                @endif
              </div>
            </div>
          </div>


          <!-- WishList Model -->
          @include('frontend.shop.wishlistModal')
          @endforeach
          @else
          <div class="col-md-12 ml-0 pl-0">
            <div class="product-name pl-0">
              <h3 class="pr_name">No produts found...!!</h3>
            </div>
          </div>
          @endif
        </div>
      </div>


    </div>
  </div>
</section>


<div>

  @if (Session::has('success'))
  <div class="alert alert-dark">
    {{ Session::get('success') }}
  </div>
  @endif

</div>
@include('frontend.modals.cartModal')
@endsection