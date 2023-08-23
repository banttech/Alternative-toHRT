<style>
    .pr_image {
        width: 60px !important;
    }
    .pr_name {
        font-size: 15px;
    }
    .pr_name a {
        color: #000;
    }
</style>
@if(count($products) > 0)
@foreach($products as $product)
<div class="row borders">
    <div class="col-md-2">
        <a href="{{ route('frontend.product', $product->slug) }}">
            <img src="{{ asset('admin_assets/images/' . $product->image) }}" class="pr_image">
        </a>
    </div>
    <div class="col-md-9">
        <div class="product-name">
            <h3 class="pr_name">
                <a href="{{ route('frontend.product', $product->slug) }}">{{ $product->productname }}</a>
            </h3>
            @if($product->id == 1)
            @php 
              $firstProductPrice = App\Models\Product::where('id',1)->first()->price;
              $fourthProductPrice = App\Models\Product::where('id',4)->first()->price;
            @endphp
            <h5>£{{ $firstProductPrice }} - £{{ $fourthProductPrice }}</h5>
            @else
            <h5>
                <span style="text-decoration: line-through; font-size: 19px;">£{{ $product->reg_sel_price }}</span> <span style="font-size: 19px;"> - £{{ $product->price }}</span>
            </h5>
            @endif
        </div>
    </div>
</div>
@endforeach
@else
<div class="row borders">
    <div class="col-md-12 ml-0 pl-0">
        <div class="product-name pl-0">
            <h3 class="pr_name">No results</h3>
        </div>
    </div>
</div>
@endif