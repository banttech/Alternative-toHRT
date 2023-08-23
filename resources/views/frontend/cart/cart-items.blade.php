<?php $cartItems = session('cart') ?>

@if($cartItems)
@foreach($cartItems as $id => $cartItem)
<tr>
    <td data-th="Product">
        <img src="{{ asset('admin_assets/images/'.$cartItem['image'])}}" alt="..." class="img-responsive" />
    </td>
    <td>
        <p>
        <a href="{{ route('frontend.product', $cartItem['slug']) }}" style="color: #000; text-decoration: none;">{{ $cartItem['name']}}</a>
    </p>
</td>
    <td data-th="Price">£{{ $cartItem['price'] }}</td>
    <td data-th="Quantity">
        <input type="number" class="quantities text-center cart-item-qty" value="{{ $cartItem['quantity'] }}" min="1" data-id="{{$cartItem['id']}}" />
    </td>
    @php
    $subtotal = $cartItem['price'] * $cartItem['quantity'];
    @endphp
    <td data-th="Subtotal" class="text-center">£{{ $subtotal }}</td>
    <td class="actions" data-th="">
        <!-- <button class="btn btn-info btn-sm"><i class="fa fa-refresh"></i></button> -->
        <button class="btn btn-danger btn-sm" onclick="removeFromCart({{$cartItem['id']}})"><i class="fa fa-trash-o"></i></button>
    </td>
</tr>
@endforeach
@else
<tr>
    <td colspan="5">
        <p>No items in cart</p>
    </td>
</tr>
@endif