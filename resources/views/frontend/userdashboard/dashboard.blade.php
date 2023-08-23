@extends('layouts.frontend.userdashboardlayouts')

@section('usercontent')
<div class="col-md-8">
    <div class="dashboard-innersecond">
             <h6>Hello {{ ucfirst(Auth::user()->firstname .' '. Auth::user()->lastname)}} (not {{ ucfirst(Auth::user()->firstname .' '. Auth::user()->lastname)}}?<a href="{{route('frontend.logout')}}"> Log out)</a></h6>
             <p>From your account dashboard you can view your <a href="{{route('frontend.userorder')}}">recent orders</a>, manage your <a href="{{route('frontend.useraddress')}}">shipping and billing addresses</a>, and <a href="{{route('frontend.useraccount')}}">edit your password and account details</a>.</p>
    </div>
</div>
@endsection