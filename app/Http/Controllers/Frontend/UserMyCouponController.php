<?php

namespace App\Http\Controllers\Frontend;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class UserMyCouponController extends Controller
{
    public function index(){
        $pageTitle = 'Alternative to HRT - My-Coupons';
        $pagetitle = 'My-Coupons';
        return view('frontend.usercoupon.usercoupon',compact('pageTitle','pagetitle'));
    }
}
