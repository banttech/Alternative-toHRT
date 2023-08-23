@if(Auth::check())
@php
$totalWishlistItems = DB::table('wish_list')->where('user_id', Auth::user()->id)->get();
@endphp
<div class="modal-header">
    <h5 class="modal-title" id="exampleModalLongTitle">Wishlist ({{ count($totalWishlistItems) }})</h5>
    <button type="button" class="close" onclick="closeWishlistModel()">
        <span aria-hidden="true">&times;</span>
    </button>
</div>
<div class="modal-body">
    @if(count($totalWishlistItems) > 0)
    @foreach($totalWishlistItems as $key => $wishlist)
    @php
    $product = App\Models\Product::where('id',$wishlist->product_id)->first();
    @endphp
    <div class="wishlist-item">
        <a onclick="removeFromWishList('{{ $wishlist->id }}', '{{ $product->id }}')" style="position: relative; color: #fff; text-decoration: none; cursor: pointer;">
            <i class="fa fa-times" style="font-size:22px;color:red"></i>
        </a>
        <img src="{{asset('admin_assets/images/'.$product->image)}}" alt="sample85" class="wishlist-image" />
        <a href="{{route('frontend.product',$product->slug)}}" class="product-name">{{$product->productname}}</a>
    </div>
    @endforeach
    @else
    <div class="wishlist-item">
        <p class="text-center">There are no products on the Wishlist!</p>
    </div>
    @endif
</div>
<div class="modal-footer justify-content-between">
    <a href="{{route('frontend.userwishlist')}}" class="btn btn-secondary btn-corner">Open Wishlist Page</a>    
    <button type="button" class="btn btn-primary btn-corner" onclick="closeWishlistModel()">Continue Shopping</button>
</div>
@endif