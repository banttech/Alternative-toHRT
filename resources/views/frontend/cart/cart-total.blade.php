<?php $cartItems = session('cart') ?>

<div class="view-cart">
    <h5>CART TOTALS</h5>
</div>
@php
    $subtotal = 0;  
    $cartTotal = 0;
@endphp

@if($cartItems)
    @foreach($cartItems as $id => $cartItem)
        @php
            $subtotal += $cartItem['price'] * $cartItem['quantity'];
        @endphp
    @endforeach

    @if(session()->has('coupon'))
        @php
            $coupon = session()->get('coupon');
            $discount = ($coupon['discount_percentage'] / 100) * $subtotal;
            $discount = number_format((float)$discount, 2, '.', '');
            $cartTotal = $subtotal - $discount;
            $cartTotal = number_format((float)$cartTotal, 2, '.', '');
        @endphp
    @else
        @php
            $cartTotal = $subtotal;
            $cartTotal = number_format((float)$cartTotal, 2, '.', '');
        @endphp
    @endif
@endif
<div class="view-cart-head">
    <h6>Subtotal</h6>
    <h6> £{{ $subtotal }} </h6>
</div>
<div class="view-cart-pra">
    <h6>Shipping</h6>
    <div>
        <p>Free shipping</p>
        <!-- <p>Free shipping</p> -->
    </div>
</div>
@if(session()->has('coupon'))
        <div class="view-cart-head">
            <h6>Coupon Discount</h6>
            <h6> - £{{ $discount ?? 0 }} </h6>
        </div>
    @endif
<div class="view-cart-head">
    <h6>Total</h6>
    <h6> £{{ $cartTotal }} </h6>
</div>
<div class="paypal-shoping">
    <a href="{{route('checkout.index')}}"> <button class="btn-card-shoping"><i class="fa fa-credit-card-alt" aria-hidden="true"></i> Proceed To Checkout</button></a>
    <!-- <a href="#"> <button class="btn-shoping">PayPal</button></a> <br> -->

</div>