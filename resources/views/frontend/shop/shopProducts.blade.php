@php
if (request()->search) {
$products = DB::table('product')->where('productname', 'like', '%' . request()->search . '%')->get();
} else {
$products = DB::table('product')->orderBy('id', 'asc')->where('status','Active')->take(4)->get();
}
@endphp

@if(count($products) > 0)
@php
$bcnt = 1;
@endphp

@foreach($products as $key => $product)
@php
$blogLength = Str::length($product->description);
$productDescription=strip_tags(htmlspecialchars_decode( $product->description));
@endphp

<div class="col-md-4">
    <div class="cards">
        <div class="img"><img src="{{asset('admin_assets/images/'.$product->image)}}" alt="sample85" /></div>
        <div class="content">
            <h3><a href="{{route('frontend.product',$product->slug)}}" class="product_name">{{$product->productname}}</a></h3>
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
                <del style="color: grey; font-size:18px;">£{{$product->reg_sel_price}}</del>&nbsp; £{{$product->price}}
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
            <a href="{{route('frontend.product',$product->slug)}}" style="position: relative; color: #fff; text-decoration: none;">
                <button>Select Options</button>
            </a>

            @if(!$wishlists)
            <h1 id={{"blackHeartIcon_".$pid}}>
                <a onclick="addToWishList('{{ $product->id }}')" style="position: relative; color: #fff; text-decoration: none; cursor: pointer;">
                    <i class="fa fa-heart-o wishlistHeart" style="font-size:22px;color:black" title="Add to Wishlist"></i>
                </a>
            </h1>
            <h1 id={{"redHeartIcon_".$pid}} style="display:none;"><a onclick="openWishListModel()" style="cursor: pointer;"><i class="fa fa-heart-o" style="font-size:22px;color:red" title="Remove from Wishlist"></i></a></h1>
            @else
            <h1 id={{"redHeartIcon_".$pid}}><a onclick="openWishListModel()" style="cursor: pointer;"><i class="fa fa-heart-o" style="font-size:22px;color:red" title="Remove from Wishlist"></i></a></h1>
            @endif

            @else
            <a onclick="addToCart('{{ $product->id }}', '{{ $product->productname }}', '{{ $product->price }}', '{{ $product->image }}', '1')" style="position: relative; color: #fff; text-decoration: none; cursor: pointer;">
                <button>Add to Cart</button>
            </a>

            @if(!$wishlists)
            <h1 id={{"blackHeartIcon_".$pid}}>
                <a onclick="addToWishList('{{ $product->id }}')" style="position: relative; color: #fff; text-decoration: none; cursor: pointer;">
                    <i class="fa fa-heart-o wishlistHeart" style="font-size:22px;color:black" title="Add to Wishlist"></i>
                </a>
            </h1>
            <h1 id={{"redHeartIcon_".$pid}} style="display:none;"><a onclick="openWishListModel()" style="cursor: pointer;"><i class="fa fa-heart-o" style="font-size:22px;color:red" title="Remove from Wishlist"></i></a></h1>
            @else
            <h1 id={{"redHeartIcon_".$pid}}><a onclick="openWishListModel()" style="cursor: pointer;"><i class="fa fa-heart-o" style="font-size:22px;color:red" title="Remove from Wishlist"></i></a></h1>
            @endif

            @endif
            @else
            @if($product->id == 1)
            <a href="{{route('frontend.product',$product->slug)}}" style="position: relative; color: #fff; text-decoration: none;">
                <button>Select Options</button>
            </a>
            @else
            <a onclick="addToCart('{{ $product->id }}', '{{ $product->productname }}', '{{ $product->price }}', '{{ $product->image }}', '1')" style="position: relative; color: #fff; text-decoration: none; cursor: pointer;">
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
