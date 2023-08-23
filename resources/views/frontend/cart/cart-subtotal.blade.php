<?php $cartItems = session('cart') ?>

<tr class="visible-xs">
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
    @endif

    @php
        $cartTotal = $subtotal;
        $coupon = session()->get('coupon');
        if($coupon) {
            $cartTotal = $subtotal - ($subtotal * $coupon['discount_percentage'] / 100);
        }
        $cartTotal = number_format((float)$cartTotal, 2, '.', '');

        $couponCode = '';
        if($coupon) {
            $couponCode = $coupon['code'];
        }
    @endphp
</tr>
<tr>
    <td colspan="6">

        <div class="update_cart">
        <div class="text-center"><a class="btn btn-success btn-block" onClick="updateCart()">Update Cart</a></div>
        <div><input type="text" class="apply-coup mb-2" id="coupon_code" placeholder="Coupon Code" value="{{ $couponCode }}" @if($coupon) readonly @endif></div>
    
    
        <div id="apply_coupon_code" style="@if($coupon) display: none; @endif"><a class="btn btn-warning applyies-new" onclick="applyCouponCode()" style="cursor: pointer;"> Apply Coupon</a></div>
        <div id="remove_coupon_code" style="@if(!$coupon) display: none; @endif"><a class="btn btn-warning" onclick="removeCouponCode()" style="cursor: pointer;"> Remove Coupon</a></div>  
    
    
        <!-- @if($coupon)
        <td><a class="btn btn-warning" onclick="removeCouponCode()" style="cursor: pointer;"><i class="fa fa-angle-left"></i> Remove Coupon</a></td>
        @else
        <td><a class="btn btn-warning" onclick="applyCouponCode()" style="cursor: pointer;"><i class="fa fa-angle-left"></i> Appy Coupon</a></td>
        @endif -->
        {{-- <td colspan="" class="hidden-xs"></td>
        <td class="hidden-xs"><strong>Total £ {{ $cartTotal }}</strong></td> --}}
        
        </div>
     
    </td>
</tr>