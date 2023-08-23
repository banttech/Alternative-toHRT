@extends('layouts.frontend.userdashboardlayouts')

@section('usercontent')
<div class="col-md-8">
   @if(count($orders)>0)
   
<div class="order-table-left">
    <table class="table">
        <thead class="bg-success text-white">
          <tr>
            <th scope="col">Order#</th>
            <th scope="col">Name</th>
            <th scope="col">Phone</th>
            <th scope="col">Email</th>
            <th scope="col">Payment Method</th>
            <th scope="col">Total Quantity</th>
            <th scope="col">Total Amount</th>
           
          </tr>
        </thead>
        <tbody>
            @foreach($orders as $key => $order)
                
           @php
              $orderQtys = DB::table('order_items')->where('order_id',$order->id)->get();
              $totalQty=0;
             
             
           @endphp
            @foreach($orderQtys as $key => $orderQty)
            @php  
            
            $totalQty=$totalQty+$orderQty->quantity;
           
            @endphp
           @endforeach
          <tr>
            <td><a href="{{route('frontend.orderDetails',$order->id)}}">{{$order->id}}</a></td>
            <td>{{ucfirst($order->bill_first_name)}}</td>
            <td>{{$order->bill_phone_number}}</td>
            <td>{{$order->bill_email}}</td>
            <td>{{ucfirst($order->payment_method)}}</td>
            <td>{{$totalQty}}</td>
            <td>£{{number_format((float)$order->total_amount, 2, '.', '')}}</td>
          </tr>
          @endforeach
         
        </tbody>
      </table>
      
     
</div>
{{-- <div>
{{ $orders->links()}}
</div> --}}
@else

<div class="dashboard-innersecond">
    <div class="download-product">
         <h1>No order has been made yet.</h1>
         <a href="{{route('frontend.shop')}}">Browse Products</a>
</div>
</div>
@endif

</div>
@endsection