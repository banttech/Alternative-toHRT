@extends('layouts.frontend.userdashboardlayouts')

@section('usercontent')
<div class="col-md-8">
    <div class="row row-padding">
        <div class="col-md-6">
            <div class="bill_no">
                <h6>Order No.: {{$billingShippingAddress->id}}</h6>
             </div>
        </div>
        <div class="col-md-6">
            <div class="bill_date">
                <h6>Date: {{$billingShippingAddress->created_at}}</h6>
             </div>
        </div>

    </div>
    <div class="row row-padding">
        <div class="col-md-6">
            <div class="oder-details-flex">
                  <h5>Billing Address</h5>
                  <hr>  
                  <p>{{$billingShippingAddress->bill_first_name.' '.$billingShippingAddress->bill_last_name}}</p>
                  <p>{{$billingShippingAddress->bill_address1}}</p>
                  <p>{{$billingShippingAddress->bill_address2}}</p>
                  <p>{{$billingShippingAddress->bill_town_city.' - '.$billingShippingAddress->bill_postcode}}</p>
                  <p>{{$billingShippingAddress->bill_county}}</p>
                  <p><b>Phone:</b> {{$billingShippingAddress->bill_phone_number}}</p>
                  <p><b>Email:</b> {{$billingShippingAddress->bill_email}}</p>
            </div>
        </div>
        <div class="col-md-6">
            <div class="oder-details-flex-1">
                <h5>Shipping Address</h5>
                <hr>  
                <p>{{$billingShippingAddress->ship_first_name.' '.$billingShippingAddress->ship_last_name}}</p>
                  <p>{{$billingShippingAddress->ship_address1}}</p>
                  <p>{{$billingShippingAddress->ship_address2}}</p>
                  <p>{{$billingShippingAddress->ship_town_city.' - '.$billingShippingAddress->ship_postcode}}</p>
                  <p>{{$billingShippingAddress->ship_county}}</p>
                 
            </div>
        </div>
    </div>
    <div class="dashboard-innersecond">
        {{-- <div class="download-product">
             <h1>Order Details.</h1>
            
        </div> --}}
         {{-- <a href="{{route('frontend.shop')}}">Browse Products</a> --}}
        <table class="table table-bordered">
            <thead class="bg-success text-white">
                <tr>
                    <th>Image</th>
                    <th>Title</th>
                    <th>Quantity</th>
                    <th>Sell Price</th>
                    <th>Total Amount</th>
                </tr>
            </thead>
            <tbody>
                @foreach($orders->order_items as $item)
                <tr>
                    <td><img src="{{asset('admin_assets/images/'.$item->image)}}" alt="sample85" height="150" width="150"/></td>
                    <td><a href="{{route('frontend.product',$item->product->slug)}}">{{$item->product->productname}}</a></td>
                   
                    <td>{{$item->quantity}}</td>
                    <td>£{{number_format((float)$item->sel_price, 2, '.', '')}}</td>
                    <td>£{{number_format((float)$item->sel_price * $item->quantity, 2, '.', '')}}</td>
                </tr>
                @endforeach
            </tbody>
        </table>
        <div class="d-flex justify-content-end">
            <div>
                @if($orders->coupon_code != null)
                <h1><strong>Coupon Applied:</strong> {{$orders->coupon_code}}</h1>
                <h1><strong>Coupon Discount:</strong> {{$orders->coupon_discount_percentage}}%</h1>
                <h1><strong>Coupon Amount:</strong> (-) £{{$orders->coupon_amount}}</h1>

                @endif
                <h1><strong>Grand Total: </strong>£{{number_format((float)$orders->total_amount, 2, '.', '')}}</h1>
            </div>
        </div>
    </div>
@endsection