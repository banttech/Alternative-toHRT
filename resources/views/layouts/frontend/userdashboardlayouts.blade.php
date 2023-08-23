@extends('layouts.frontend.app')

@section('userdashboard')
{{-- @php
$url = url()->full();
$url2=explode('my-account',$url);
if($url2[1]==''){
$txt='My Account';
}else{
$url3=explode('/',$url2[1]);
if($url3[1]=='edit-address'){
$txt='Addresses';
}
elseif($url3[1]=='add-address'){
$txt='Addresses';
}
elseif($url3[1]=='edit-account'){
$txt='Account Details';
}
elseif($url3[1]=='my-coupons'){
$txt='My-Coupons';
}
else{

$txt=$url3[1];
}
}

@endphp --}}
<section class="about-page">
    <div class="conatiner-fluid about-inner">
        <div class="row about-row">
            <div class="about-heading">
                <h6>{{ucfirst($pagetitle ?? 'My-Account')}}</h6>
            </div>
        </div>
    </div>
</section>

<section class="dashboard">
    <div class="dashboard-inner">
        <div class="container">
        <div class="row">
            <div class="col-md-4">
                <div class="dashboard-innerone">
                    <a href="{{route('frontend.userdashboard')}}">
                        <p>Dashboard</p>
                    </a>
                    <div class="dashboard-img">
                        <i class="fa fa-tachometer" aria-hidden="true"></i>
                    </div>
                </div>
                <div class="dashboard-innerone">

                    <a href="{{route('frontend.userorder')}}">
                        <p>Orders</p>
                    </a>

                    <div class="dashboard-img">
                        <i class="fa fa-shopping-basket" aria-hidden="true"></i>
                    </div>
                </div>
                <div class="dashboard-innerone">
                    <a href="{{route('frontend.userdownload')}}">
                        <p>Download</p>
                    </a>

                    <div class="dashboard-img">
                        <i class="fa fa-download" aria-hidden="true"></i>
                    </div>
                </div>
                <div class="dashboard-innerone">
                    <a href="{{route('frontend.useraddress')}}">
                        <p>Addresses</p>
                    </a>

                    <div class="dashboard-img">
                        <i class="fa fa-home" aria-hidden="true"></i>
                    </div>
                </div>
                <div class="dashboard-innerone">
                    <a href="{{route('frontend.useraccount')}}">
                        <p>Account Details</p>
                    </a>

                    <div class="dashboard-img">
                        <i class="fa fa-user" aria-hidden="true"></i>
                    </div>
                </div>
                <div class="dashboard-innerone">
                    <a href="{{route('frontend.usercoupon')}}">
                        <p>My Coupons</p>
                    </a>

                    <div class="dashboard-img">
                        <i class="fa fa-id-badge" aria-hidden="true"></i>
                    </div>
                </div>

                <div class="dashboard-innerone">
                    <a href="{{route('frontend.userwishlist')}}">
                        <p>Wishlist</p>
                    </a>

                    <div class="dashboard-img">
                        <i class="fa fa-id-badge" aria-hidden="true"></i>
                    </div>
                </div>

                <div class="dashboard-innerone-last">
                    <a href="{{route('frontend.logout')}}">
                        <p>Logout</p>
                    </a>

                    <div class="dashboard-img">
                        <i class="fa fa-sign-out" aria-hidden="true"></i>
                    </div>
                </div>
            </div>
            @yield('usercontent')
        </div>
    </div>
    </div>

</section>

@endsection
