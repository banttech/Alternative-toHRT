@extends('layouts.frontend.userdashboardlayouts')

@section('usercontent')
<div class="col-md-8">
  <div class="billing-add">
    <h6>The following addresses will be used on the checkout page by default.</h6>
   

  

    @if($billing)
    <div class="billing-text ">
      <h5>Billing Address</h5>
      <div class="billing-fa">
        <a href="{{route('frontend.billing.edit')}}"><i class="fa fa-edit" title="Edit Billing Address"></i></a>
      </div>
    </div>
    <div class="billing-pra border-new-sitemap">
      <p>{{ ucfirst(Auth::user()->firstname .' '. Auth::user()->lastname)}}</p>
      <p>{{$billing->streetaddress}}</p>
      <p>{{$billing->city}}</p>
      <p>{{$billing->region}}</p>
      <p>{{$billing->postcode}}</p>
    </div>
    @else
    <div class="billing-text border-new-sitemap">
      <div class="billing-inner">
        
        <h5>Billing Address</h5>
        <h6>You don't have billing address. Please add.</h6>
      </div>
     
      
      <div class="billing-fa">
        <a href="{{route('frontend.billing.create')}}"><i class="fa fa-edit" title="Add Billing Address"></i></a>
      </div>
    </div>
    @endif



    @if($shipping)
    <div class="billing-text">
      <h5>Shipping Address</h5>
      <div class="billing-fa">
        <a href="{{route('frontend.shipping.edit')}}"><i class="fa fa-edit" title="Edit Shipping Address"></i></a>
      </div>
    </div>
    <div class="billing-pra">
      <p>{{ ucfirst(Auth::user()->firstname .' '. Auth::user()->lastname)}}</p>
      <p>{{$shipping->streetaddress}}</p>
      <p>{{$shipping->city}}</p>
      <p>{{$shipping->region}}</p>
      <p>{{$shipping->postcode}}</p>
    </div>
    @else
    <div class="billing-text">
      <div class="billing-inner">
        
        <h5>Shipping Address</h5>
        <h6>You don't have shipping address. Please add.</h6>
      </div>
     
      <div class="billing-fa">
        <a href="{{route('frontend.shipping.create')}}"><i class="fa fa-edit" title="Add Shipping Address"></i></a>
      </div>
    </div>
    @endif




  </div>
</div>
@endsection