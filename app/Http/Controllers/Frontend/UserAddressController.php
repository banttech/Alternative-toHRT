<?php

namespace App\Http\Controllers\Frontend;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use DB;

class UserAddressController extends Controller
{
    public function index()
    {

        $pageTitle = 'Alternative to HRT - Addresses';
        $pagetitle = 'Addresses';
        $billing = DB::table('user_billing_address')->where('user_id', Auth::user()->id)->first();
        $shipping = DB::table('user_shipping_address')->where('user_id', Auth::user()->id)->first();

        return view('frontend.useraddress.useraddress', compact('billing', 'shipping','pageTitle','pagetitle'));
    }
}
