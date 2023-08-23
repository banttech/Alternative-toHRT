<?php $cartItems = session('cart') ?>
@extends('layouts.frontend.app')
@section('content')
<section class="about-page">
  <div class="conatiner-fluid about-inner">
    <div class="row about-row">
      <div class="about-heading">
        <h6>Shopping Cart</h6>
      </div>
    </div>
  </div>
</section>

<section class="checkout" id="cart-page-main-sec">
  @if($cartItems)
    <div class="container">
      <div class="row">
        <div class="col-md-8">
          <div class="container">
            <table id="cart" class="table table-hover table-condensed">
              <thead>
                <tr>
                  <th></th>
                  <th>Product</th>
                  <th>Price</th>
                  <th>Quantity</th>
                  <th>Subtotal</th>
                  <th></th>
                </tr>
              </thead>
              <tbody id="cart-item-list">
                @include('frontend.cart.cart-items')
              </tbody>
              <tfoot id="sub-total-sec">
                @include('frontend.cart.cart-subtotal')
              </tfoot>
            </table>
          </div>
        </div>
        <div class="col-md-4 view-cart-border" id="cart-total-sec">
          @include('frontend.cart.cart-total')
        </div>
      </div>
    </div>
  @else
    @include('frontend.cart.empty-cart')
  @endif
</section>

<script>
  function updateCart() {
    const inputFields = document.getElementsByClassName("cart-item-qty");

    // check if input field is empty then show alert and stop the execution and return
    if (inputFields.length == 0) {
      toastr.error('Cart is empty');
      return;
    }

    const items = [];
    // Loop through the input fields
    for (let i = 0; i < inputFields.length; i++) {
      const input = inputFields[i];
      const id = input.dataset.id;
      const value = input.value;
      items.push({
        id: id,
        quantity: value
      });
    }

    // Send the request to the server
    $.ajax({
      url: "{{route('cart.update')}}",
      type: "POST",
      data: {
        items: items,
        _token: "{{ csrf_token() }}"
      },
      success: function(response) {
        $('#cart_count').html(response.totalItems);
        $('#cart-item-list').html(response.cartItemsList);
        $('#sub-total-sec').html(response.cartSubTotalSec);
        $('#cart-total-sec').html(response.cartTotalSec);
        toastr.success(response.message);
      }
    });
  }

  function applyCouponCode() {
    const couponCode = document.getElementById('coupon_code').value;
    if (couponCode.length == 0) {
      toastr.error('Please enter coupon code');
      return;
    }

    // check if user is not logged in then show toastr error message
    var userId = "{{ auth()->user()->id ?? '' }}";
    if (userId == '') {
      toastr.error('Please login to apply coupon code');
      return;
    }

    $.ajax({
      url: "{{route('cart.apply.coupon')}}",
      type: "POST",
      data: {
        couponCode: couponCode,
        _token: "{{ csrf_token() }}"
      },
      success: function(response) {
        // check if response status is 0 then show error message
        if (response.status == 0) {
          toastr.error(response.message);
          return;
        }
        $('#sub-total-sec').html(response.cartSubTotalSec);
        $('#cart-total-sec').html(response.cartTotalSec);
        $('#apply_coupon_code').hide();
        $('#remove_coupon_code').show();
        // make coupon_code input field readonly
        $('#coupon_code').attr('readonly', true);
        toastr.success(response.message);
      }
    });
  }

  function removeCouponCode() {
    $.ajax({
      url: "{{route('cart.remove.coupon')}}",
      type: "POST",
      data: {
        _token: "{{ csrf_token() }}"
      },
      success: function(response) {
        $('#sub-total-sec').html(response.cartSubTotalSec);
        $('#cart-total-sec').html(response.cartTotalSec);
        $('#apply_coupon_code').show();
        $('#remove_coupon_code').hide();
        // make coupon_code input field readonly
        $('#coupon_code').attr('readonly', false);
        toastr.success(response.message);
      }
    })
  }
</script>

@endsection