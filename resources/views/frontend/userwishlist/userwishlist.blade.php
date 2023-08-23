@extends('layouts.frontend.userdashboardlayouts')

@section('usercontent')
<div class="col-md-8">
  <div class="whishlist-inner">
    <div class="row">
      @if(count($wishlists)>0)
      @foreach($wishlists as $key => $wishlist)
      @php
    $products = DB::table('product')->where('id', $wishlist->product_id)->first();
    $productCategory = DB::table('productcategory')->where('id', $products->product_category_id)->first();
    @endphp

    
      
    
        <div class="col-md-4 mb-3">
          <div class="card" id="wishlist-card">
            <img src="{{asset('admin_assets/images/'.$products->image)}}" width="" height="" alt="sample85" />
            <div class="card-body" id="wish-card_body">
              <h5 class="card-title wishlist-title-height"><a href="{{route('frontend.product',$products->slug)}}" class="text-success">{{$products->productname}}</a></h5>
              <h6><a href="{{route('frontend.product.category', $productCategory->slug)}}">{{$productCategory->categoryname}}</a></h6>
              @if($products->id == 1)
              @php
              $firstProductPrice = App\Models\Product::where('id',1)->first()->price;
              $fourthProductPrice = App\Models\Product::where('id',4)->first()->price;
              @endphp
              <p>  £{{ $firstProductPrice }} - £{{ $fourthProductPrice }}</p>
              @else
              <p><del style="color: grey; font-size:18px;">£{{$products->reg_sel_price}}</del>&nbsp; £{{$products->price}}</p>
              @endif
              <button type="button" class="btn btn-danger whistlist-btn"><a href="{{route('frontend.userwishlist.remove',$products->id)}}" class="text-white">Remove</a></button>
            </div>
          </div>
        </div>
       
    
        @endforeach
        
      
      </div>
    </div>
  </div>
  @else
         
  <div class="col-md-8">
    <div class="dashboard-innersecond" id="qwerty">
      <div class="download-product">
           <h1>No downloads available yet.</h1>
           <a href="{{route('frontend.shop')}}">Browse Products</a>
  </div>
</div>
        @endif
</div>
@endsection

{{-- 
<div class="col-md-8">
  <div class="dashboard-innersecond">
    @foreach($wishlists as $key => $wishlist)
    @php
    $products = DB::table('product')->where('id', $wishlist->product_id)->first();
    @endphp
    <img src="{{asset('admin_assets/images/'.$products->image)}}" width="120px" height="120px" alt="sample85" />
    <h5><a href="{{route('frontend.product',$products->slug)}}">{{$products->productname}}</a></h5>
    <div class="price">
      £{{$products->price}}
    </div>

    <h5><a href="{{route('frontend.userwishlist.remove',$products->id)}}">Remove</a></h5>
    @endforeach
  </div>

   --}}
































