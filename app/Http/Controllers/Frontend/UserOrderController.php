<?php

namespace App\Http\Controllers\Frontend;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Auth;
use App\Models\Order;

class UserOrderController extends Controller
{
    public function index()
    {
        $pageTitle = 'Alternative to HRT - Orders';
        $pagetitle = 'Orders';

        $orders = DB::table('orders')->where('user_id', Auth::user()->id)->orderby('id', 'desc')->paginate(20);

        return view('frontend.userorders.order', compact('pageTitle', 'orders','pagetitle'));
    }
    public function orderDetails($id){

        $pageTitle = 'Alternative to HRT - Order Detail';
        $pagetitle = 'Order Detail';
        $orders = Order::with('order_items.product')->where('id',$id)->first();
        $billingShippingAddress = DB::table('orders')->where('id',$id)->first();
        // dd($billingShippingAddress);
        return view('frontend.userorders.order-detail',compact('pageTitle','orders','pagetitle','billingShippingAddress'));
    }
}
