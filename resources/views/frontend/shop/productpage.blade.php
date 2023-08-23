@extends('layouts.frontend.app')

@section('content')
{{-- <link rel='stylesheet' href='https://cdnjs.cloudflare.com/ajax/libs/uikit/3.2.0/css/uikit.min.css'> --}}
<script src='https://cdnjs.cloudflare.com/ajax/libs/uikit/3.2.0/js/uikit.min.js'></script>
<link rel='stylesheet' href='{{ asset('frontend_assets/assets/css/uikit.min.css')}}'>
<style>
    /* Hide the increment and decrement buttons */
    #product-quantity::-webkit-inner-spin-button,
    #product-quantity::-webkit-outer-spin-button {
        display: none;
    }

    .packs-list {
        display: flex;
        gap: 35px;
        list-style: none;
        margin-left: 0px !important;
    }

    .packs-list li {
        border: 1px solid #e6e6e6;
        padding: 6px 15px;
        cursor: pointer;
    }

    .packs-list li.active {
        border: 1px solid #289c28;
    }

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

    .hidden {
        display: none;
    }

    .stock-text {
        width: 100%;
        text-align: center !important;
    }

    .card-wheel {
        display: flex;
    }

    section.add-info-block div#addinfoblock {
        text-align: center;
        margin-top: 27px;
    }

    section.add-info-block span#desc,
    section.add-info-block span#addinfo {
        font-size: 1.20rem;
        font-weight: bold;
        text-align: center;
        margin-left: 20px;
        margin-right: 20px;
    }

    section.add-info-block div#addinfoblockdet {
        /* margin-left:80px; */
        padding: 40px;
        justify-content: center;

    }

    section.add-info-block span#desc_det,
    section.add-info-block span#addinfo_det {
        font-size: 1rem;
    }

    section.add-info-block div#addinfoblockdet table {
        width: 100%;

    }

    .desccls::after {
        width: 100%;
        content: '';
        position: absolute;
        height: 3px;
        bottom: -9px;
        left: 0;
        background: green;
        -webkit-transition: all ease 0.3s;
        transition: all ease 0.3s;

    }
    
    .descai_clsadd::after {
        width: 100%!important;
        content: ''!important;
        position: absolute!important;
        height: 3px!important;
        bottom: -9px!important;
        left: 0!important;
        background: green!important;
        -webkit-transition: all ease 0.3s!important;
        transition: all ease 0.3s!important;
    }

    @media only screen and (max-width: 500px) {

        section.add-info-block span#desc,
        section.add-info-block span#addinfo {
            font-size: 16px;

        }

        section.add-info-block span#desc_det,
        section.add-info-block span#addinfo_det {
            font-size: 14px;
        }
    }

    @media only screen and (max-width: 500px) {

        section.add-info-block span#desc,
        section.add-info-block span#addinfo {
            font-size: 13px;

        }

        section.add-info-block span#desc_det,
        section.add-info-block span#addinfo_det {
            font-size: 13px;
        }
    }
</style>

<section class="about-page">
    <div class="conatiner-fluid about-inner">
        <div class="row about-row">
            <div class="about-heading">
                <h6>{{$products->productname}}</h6>
            </div>
        </div>
    </div>
</section>


<section class="product-detail-page">
    <div class="container">
        <div class="row">
                <div class="col-md-6">
                        <div class="">
                            <div id="slideshow" class="uk-position-relative uk-visible-toggle uk-light" tabindex="-1"
                                uk-slideshow>

                                <ul class="uk-slideshow-items">
                                    <li>
                                        <img src={{asset('admin_assets/images/'.$products->image)}} alt="">
                                    </li>

                                    @php
                                    $allimages = '';
                                    @endphp

                                    @php
                                    $allimages = $allimages . "," . $products->multiple_images;

                                    $imagearrs = explode(',',$allimages);

                                    @endphp
                                    @foreach($imagearrs as $key => $imagearr)
                                    @if($imagearr!="")

                                    <li>

                                        <img src={{asset('admin_assets/images/'.$imagearr)}} width="504px"
                                            height="336px" alt="">
                                    </li>
                                    @endif
                                    @endforeach


                                </ul>

                                <a class="uk-position-center-left uk-position-small uk-hidden-hover" href="#"
                                    uk-slidenav-previous uk-slideshow-item="previous"></a>
                                <a class="uk-position-center-right uk-position-small uk-hidden-hover" href="#"
                                    uk-slidenav-next uk-slideshow-item="next"></a>

                            </div>
                            <div id="slider" class="uk-position-relative uk-visible-toggle uk-light" tabindex="-1"
                                uk-slider="center: true">

                                <ul class="uk-slider-items uk-grid uk-thumbnav">
                                    <li class="uk-width-1-4" uk-slideshow-item="0">
                                        <div class="uk-panel">
                                            <img src={{asset('admin_assets/images/'.$products->image)}} alt="">
                                            <div class="uk-position-center uk-panel">
                                                <h1></h1>
                                            </div>
                                        </div>
                                    </li>

                                    @php
                                    $allimages = '';
                                    @endphp

                                    @php
                                    $allimages = $allimages . "," . $products->multiple_images;

                                    $imagearrs = explode(',',$allimages);

                                    @endphp
                                    @foreach($imagearrs as $key => $imagearr)
                                    @if($imagearr!="")

                                    <li class="uk-width-1-4" uk-slideshow-item={{$key}}>
                                        <div class="uk-panel">
                                            <img src={{asset('admin_assets/images/'.$imagearr)}} alt="">
                                            <div class="uk-position-center uk-panel">
                                                <h1></h1>
                                            </div>
                                        </div>
                                    </li>
                                    @endif
                                    @endforeach

                                </ul>

                                <a class="uk-position-center-left uk-position-small uk-hidden-hover" href="#"
                                    uk-slidenav-previous uk-slider-item="previous"></a>
                                <a class="uk-position-center-right uk-position-small uk-hidden-hover" href="#"
                                    uk-slidenav-next uk-slider-item="next"></a>
                            </div>
                       
                    </div>
                </div>
            


            <div class="col-md-6">
                <div class="product-details">
                    @php
                    $descriptionlength = Str::length($products->description);
                    @endphp
                    <div class="stock">
                        @if($products->stockunit==0)

                        <h5 class="bg-danger">Out Of Stock</h5>
                        @else
                        <h5 class="">In Stock</h5>
                        @endif

                        <a href="{{route('frontend.productbrand')}}">
                            <h6>{{$brands->brandname}}</h6>
                        </a>

                    </div>
                    <h2>{{$products->productname}}</h2>
                    @php
                    $fourthProduct = DB::table('product')->where('id', 4)->first();
                    @endphp

                    @if($products->id == 1)
                    <h4>£{{$products->price}}-£{{$fourthProduct->price}}</h4>
                    @else
                    <h4><del
                            style="color: grey; font-size:18px;">£{{$products->reg_sel_price}}</del>&nbsp;£{{$products->price}}
                    </h4>
                    @endif

                    @if($descriptionlength>50)
                    <p>{!!substr($products->description, 0,500)!!}</p>
                    @else
                    <p>{!!$products->description!!}</p>
                    @endif
                </div>

                @if($products->id == 1)
                <div>
                    @php
                    $secondProduct = DB::table('product')->where('id', 2)->first();
                    $thirdProduct = DB::table('product')->where('id', 3)->first();
                    @endphp
                    <h4>Choose One of Money Saving Pack</h4>
                    <h5 id="selected-pack-label">Single Bottle</h5>
                    <ul class="packs-list">
                        <li id="pack2" data-id="{{$secondProduct->id}}" data-name="{{$secondProduct->productname}}"
                            data-image="{{$secondProduct->image}}" data-price="{{$secondProduct->price}}"
                            reg-sel-price="{{$secondProduct->reg_sel_price}}" data-label="Pack of 2 Bottles"
                            product-quantity="{{$secondProduct->stockunit}}" onclick="changePack(this)"
                            class="pack__list">Pack of 2 Bottles</li>
                        <li id="pack3" data-id="{{$thirdProduct->id}}" data-name="{{$thirdProduct->productname}}"
                            data-image="{{$thirdProduct->image}}" data-price="{{$thirdProduct->price}}"
                            reg-sel-price="{{$thirdProduct->reg_sel_price}}" data-label="Pack of 3 Bottles"
                            product-quantity="{{$thirdProduct->stockunit}}" onclick="changePack(this)"
                            class="pack__list">Pack of 3 Bottles</li>
                        <li id="pack4" data-id="{{$fourthProduct->id}}" data-name="{{$fourthProduct->productname}}"
                            data-image="{{$fourthProduct->image}}" data-price="{{$fourthProduct->price}}"
                            reg-sel-price="{{$fourthProduct->reg_sel_price}}" data-label="Pack of 4 Bottles"
                            product-quantity="{{$fourthProduct->stockunit}}" onclick="changePack(this)"
                            class="pack__list">Pack of 4 Bottles</li>
                        <li id="pack1" data-id="{{$products->id}}" data-name="{{$products->productname}}"
                            data-image="{{$products->image}}" data-price="{{$products->price}}"
                            reg-sel-price="{{$products->reg_sel_price}}" data-label="Single Bottle"
                            product-quantity="{{$products->stockunit}}" onclick="changePack(this)"
                            class="active pack__list active">Single Bottle</li>
                    </ul>
                    <input type="hidden" id="get-product-quantity" value="{{$products->stockunit}}">
                    <p>
                        <label id="product-price">£{{number_format((float)$products->price, 2, '.', '')}}</label>
                        <label style="text-decoration: line-through;"
                            id="product-org-price">£{{number_format((float)$products->reg_sel_price, 2, '.',
                            '')}}</label>
                    </p>
                </div>
                @endif



                @if($products->stockunit==0)

                <div class="card-wheel-red bg-danger">
                    Product is now out of stock!
                </div>


                @else

                <div class="card-wheel">
                    <button onclick="decreaseQty()" id="minus">-</button>
                    <input type="number" value="1" id="product-quantity" data-id="{{$products->id}}"
                        style="width: 30px; text-align: center; border: none; outline: none;" disabled>
                    <button onclick="increaseQty()" id="plus">
                        +</button>
                    @if($products->id == 1)
                    @if($products->stockunit==0)
                    <p class="text-danger">Out of Stock</p>
                    @else
                    <button type="button" class="btn-wheel btn-success " id="add-to-cart-btn"
                        onclick="addPackItemInCart()">Add to
                        Cart</button>
                    <p class="text-danger hidden stock-text" id="stock-btn">
                        Out of stock
                    </p>
                    @endif

                    @else
                    <button type="button" class="btn-wheel btn-success"
                        onclick="addToCartWithQty('{{ $products->id }}', '{{ $products->productname }}', '{{ $products->image }}', '{{ $products->price }}')">Add
                        to Cart</button>
                    @endif
                </div>
                <div class="paypal" id="button-card">
                    <a href="{{route('checkout.index')}}"> <button class="btn-card"><i class="fa fa-credit-card-alt"
                                aria-hidden="true"></i> Proceed To Checkout</button></a>

                </div>
                @endif


                @php
                $category = DB::table('productcategory')->where('id',$products->product_category_id)->first();
                @endphp
                <div class="category">
                    <h6>Category: <a
                            href="{{route('frontend.product.category',$category->slug)}}">{{$category->categoryname}}</a>
                    </h6>
                </div>
                <h6>Tags:
                    @php
                    $alltags = '';
                    @endphp

                    {{-- @php
                    $tags = explode(',',$products->tags);
                    @endphp --}}
                    <div class="tags">


                        @php
                        $alltags = $alltags . "," . $products->tags;

                        $tagarr = explode(',',$alltags);

                        $results = array_unique( $tagarr, SORT_REGULAR);
                        @endphp
                        @foreach($results as $key => $result)
                        @if($result!="")

                        <a href="{{ route('frontend.product.tag', $result) }}">{{$result}}</a>
                        @endif
                        @endforeach

                </h6>
            </div>
        </div>
    </div>
    </div>
</section>

@php
//dd($products->dimensions);
$dimarr = explode(",", trim($products->dimensions));
$dimarr2 = explode(",", trim($dimarr[2]));
@endphp

<section class="add-info-block">
    <div class="container">
        <div class="row">
            <div class="col-md-12">
                <hr>
                <div id="addinfoblock">
                    <span id="desc" class="desccls" onclick="chgTab('desc')" onmouseover="apply_descai_clsadd('desc')" onmouseout="apply_descai_clsrmv('desc')">Description</span>
                    <span id="addinfo" onclick="chgTab('addinfo')" onmouseover="apply_descai_clsadd('addinfo')" onmouseout="apply_descai_clsrmv('addinfo')">Additional information</span>
                </div>
                <hr>
                <div id="addinfoblockdet">
                    <span id="desc_det">{{ strip_tags($products->description) }}</span>
                    <span id="addinfo_det" style="display:none;">
                        <table class="table table-bordered">
                            <tr>
                                <td width="50%">Weight</td>
                                <td width="50%">{{ $products->weight }}</td>
                            </tr>
                            <tr>
                                <td width="50%">Dimensions</td>
                                <td width="50%">{{ $dimarr[0] . " X " . $dimarr[1] . " X " . $dimarr2[0] . " cm" }}</td>
                            </tr>
                        </table>
                    </span>
                </div>
            </div>
        </div>
    </div>
</section>

<section class="shop-second">
    <h2>Related Products</h2>
    <div class="container">
        <div class="row">
            @foreach($allProducts as $key => $allProduct)
            <div class="col-md-4 col-sm-6">
                <div class="shop-inner">
                    <figure class="snip1418"><img src="{{asset('admin_assets/images/'.$allProduct->image)}}"
                            alt="sample85" />
                        <div class="add-to-cart">
                            <i class="ion-android-add"></i>
                            <span>
                                @if($allProduct->id == 1)
                                <a href="{{route('frontend.product',$allProduct->slug)}}"
                                    style="position: relative; color: #fff; text-decoration: none;">
                                    Select options
                                </a>
                                @else
                                <a onclick="addToCart('{{ $allProduct->id }}', '{{ $allProduct->productname }}', '{{ $allProduct->price }}', '{{ $allProduct->image }}', '1')"
                                    style="position: relative; color: #fff; text-decoration: none; cursor: pointer;">
                                    Add to Cart
                                </a>
                                @endif
                            </span>
                        </div>
                        <figcaption>
                            <h3><a href="{{route('frontend.product',$allProduct->slug)}}"
                                    class="product_name">{{$allProduct->productname}}</a></h3>
                            @php
                            $categorys =
                            DB::table('productcategory')->where('id',$allProduct->product_category_id)->first();
                            @endphp
                            <!--<p class="text-center text-white"><a
                                    href="{{route('frontend.product.category',$categorys->slug)}}">{{$categorys->categoryname}}</a>
                            </p>-->
                            @if($allProduct->id == 1)
                            @php
                            $firstProductPrice = App\Models\Product::where('id',1)->first()->price;
                            $fourthProductPrice = App\Models\Product::where('id',4)->first()->price;
                            @endphp
                            <div class="price text-center">
                                £{{ $firstProductPrice }} - £{{ $fourthProductPrice }}
                            </div>
                            @else
                            <div class="price text-center">
                                £{{$allProduct->price}}
                            </div>
                            @endif
                    </figure>
                </div>
            </div>
            @endforeach
        </div>
    </div>
</section>

<script>
    function increaseQty() {
        var inputElement = document.getElementById('product-quantity');
        var qty = parseInt(inputElement.value);
        var value = parseInt(document.getElementById('get-product-quantity').value);

        // Check if the current quantity is equal to the predefined value
        if (qty === value) {
            alert('Quantity reached the maximum value.');
            return;
        }

        var newqty = qty + 1;
        if (newqty > value) {
            newqty = value;
        }

        inputElement.value = newqty;
    }



    function decreaseQty() {
        var qty = document.getElementById('product-quantity').value;
        var newqty = parseInt(qty) - 1;
        if (newqty < 1) {
            newqty = 1;
        }
        document.getElementById('product-quantity').value = newqty;
    }

    function addToCartWithQty(id, name, price, image) {
        var quantity = $('#product-quantity').val();

        $token = "{{ csrf_token() }}";
        $.ajax({
            url: "{{route('cart.add')}}"
            , type: "POST"
            , data: {
                id: id
                , product_name: name
                , product_price: price
                , product_image: image
                , quantity: quantity
                , _token: $token
            }
            , success: function(response) {
                $('#cart_count').html(response.totalItems);
                // launch the cartModal and show the data
                $('#cart-modal-image').attr('src', "{{asset('admin_assets/images/')}}" + '/' + response.image);
                $('#cart-modal-product-name').html(response.prodcutName);
                $('#cart-modal-total-price').html('£' + response.totalPrice);
                $('#total-items-in-cart').html(response.totalItems + ' items');
                $('#cart-modal-product-link').attr('href', "{{route('frontend.product','')}}" + '/' + response.slug);
                $('#cart-modal-product-link-img').attr('href', "{{route('frontend.product','')}}" + '/' + response.slug);
                $('#cartModal').modal('show');
                // toastr.success(response.message);
                // $('#cart_count').html(response.totalItems);
            }
        });
    }

    function addPackItemInCart() {
        // get all pack__list class and check where active class is present get values of that
        var pack = $('.pack__list.active').attr('data-label');
        var id = $('.pack__list.active').attr('data-id');
        var name = $('.pack__list.active').attr('data-name');
        var price = $('.pack__list.active').attr('data-price');
        var image = $('.pack__list.active').attr('data-image');
        var quantity = $('#product-quantity').val();

        $token = "{{ csrf_token() }}";
        $.ajax({
            url: "{{route('cart.add')}}"
            , type: "POST"
            , data: {
                id: id
                , product_name: name
                , product_price: price
                , product_image: image
                , quantity: quantity
                , _token: $token
            }
            , success: function(response) {
                // toastr.success(response.message);
                $('#cart_count').html(response.totalItems);
                // launch the cartModal and show the data
                $('#cart-modal-image').attr('src', "{{asset('admin_assets/images/')}}" + '/' + response.image);
                $('#cart-modal-product-name').html(response.prodcutName);
                $('#cart-modal-total-price').html('£' + response.totalPrice);
                $('#total-items-in-cart').html(response.totalItems + ' items');
                $('#cart-modal-product-link').attr('href', "{{route('frontend.product','')}}" + '/' + response.slug);
                $('#cart-modal-product-link-img').attr('href', "{{route('frontend.product','')}}" + '/' + response.slug);
                $('#cartModal').modal('show');
                // toastr.success(response.message);
                // $('#cart_count').html(response.totalItems);
            }
        });
    }

    function changePack(e) {
        var pack = e.getAttribute('data-label');
        var packId = e.getAttribute('id');
        var price = parseFloat(e.getAttribute('data-price'));
        var regSelPrice = parseFloat(e.getAttribute('reg-sel-price'));
        var quantity = parseFloat(e.getAttribute('product-quantity'));
        document.getElementById('selected-pack-label').innerHTML = pack;
        document.getElementById('get-product-quantity').value = quantity;

        document.getElementById('product-quantity').value = 1;
        var quantity = parseInt(document.getElementById('get-product-quantity').value);
        var addToCartButton = document.getElementById('add-to-cart-btn');
        var buttonCard = document.getElementById('button-card');
        var stockBtn = document.getElementById('stock-btn');
        var plus = document.getElementById('plus');
        var minus = document.getElementById('minus');
        var productQuantity = document.getElementById('product-quantity');


        if (quantity === 0) {
            addToCartButton.style.display = 'none';
            plus.style.display = 'none';
            minus.style.display = 'none';
            buttonCard.style.display = 'none';
            productQuantity.style.display = 'none';
            stockBtn.classList.remove('hidden');
        } else {
            addToCartButton.style.display = 'block';
            buttonCard.style.display = 'block';
            productQuantity.style.display = 'block';
            plus.style.display = 'block';
            minus.style.display = 'block';

            stockBtn.classList.add('hidden');
        }

        if (packId == 'pack1') {
            $('#product-price').html('£' + price);
            $('#product-org-price').html('£' + regSelPrice.toFixed(2));
            $('#pack1').addClass('active');
            $('#pack2').removeClass('active');
            $('#pack3').removeClass('active');
            $('#pack4').removeClass('active');
        } else if (packId == 'pack2') {
            $('#product-price').html('£' + price);
            $('#product-org-price').html('£' + regSelPrice.toFixed(2));
            $('#pack2').addClass('active');
            $('#pack1').removeClass('active');
            $('#pack3').removeClass('active');
            $('#pack4').removeClass('active');
        } else if (packId == 'pack3') {
            $('#product-price').html('£' + price);
            $('#product-org-price').html('£' + regSelPrice.toFixed(2));
            $('#pack3').addClass('active');
            $('#pack1').removeClass('active');
            $('#pack2').removeClass('active');
            $('#pack4').removeClass('active');
        } else if (packId == 'pack4') {
            $('#product-price').html('£' + price);
            $('#product-org-price').html('£' + regSelPrice.toFixed(2));
            $('#pack4').addClass('active');
            $('#pack1').removeClass('active');
            $('#pack2').removeClass('active');
            $('#pack3').removeClass('active');
        }
    }


    function chgTab(tabid) {
        if (tabid == "desc") {
            document.getElementById("addinfo").classList.remove("descai_clsadd");
            document.getElementById('addinfo_det').style.display = 'none';
            document.getElementById('desc_det').style.display = '';
        } else if (tabid == "addinfo") {
            document.getElementById("desc").classList.remove("desccls");
            document.getElementById("desc").classList.remove("descai_clsadd");
            document.getElementById('desc_det').style.display = 'none';
            document.getElementById('addinfo_det').style.display = '';
        }
    }
    
    function apply_descai_clsadd(tabid) {
        if (tabid == "desc") {
            var dd = document.getElementById("desc_det");
            if (window.getComputedStyle(dd).display === "none") {
                document.getElementById("desc").classList.add("descai_clsadd");
            }
        } else if (tabid == "addinfo") {
            var aid = document.getElementById("addinfo_det");
            if (window.getComputedStyle(aid).display === "none") {
                document.getElementById("addinfo").classList.add("descai_clsadd");
            }
        }
    }
    
    function apply_descai_clsrmv(tabid) {
        if (tabid == "desc") {
            var dd = document.getElementById("desc_det");
            if (window.getComputedStyle(dd).display === "none") {
                document.getElementById("desc").classList.remove("descai_clsadd");
            }
        } else if (tabid == "addinfo") {
            var aid = document.getElementById("addinfo_det");
            if (window.getComputedStyle(aid).display === "none") {
                document.getElementById("addinfo").classList.remove("descai_clsadd");
            }
        }
    }


    UIkit.util.on("#slider li", 'click', function() {
        UIkit.slideshow('#slideshow').show(this.getAttribute('uk-slideshow-item'));
    });
    UIkit.util.on("#slideshow", 'itemshow', function(a, b) {
        UIkit.slider("#slider").show(b.index);
    });

</script>

@include('frontend.modals.cartModal')
@endsection