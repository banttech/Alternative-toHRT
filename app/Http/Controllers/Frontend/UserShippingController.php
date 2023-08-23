<?php

namespace App\Http\Controllers\Frontend;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use DB;

class UserShippingController extends Controller
{
    public function create()
    {
        
        $shipping = DB::table('user_shipping_address')->where('user_id', Auth::user()->id)->first();
        if ($shipping) {
            return redirect()->route('frontend.useraddress');
        } else {
            $pageTitle = 'Alternative to HRT - Add Shipping Address';
            $pagetitle = 'Add Shipping Address';
            return view('frontend.useraddress.shippingcreate', compact('pageTitle','pagetitle'));
        }
    }
    public function store(Request $request)
    {
        $request->validate(
            [
                'firstname' => 'required',
                'lastname' => 'required',
                'region' => 'required',
                'streetaddress' => 'required',
                'city' => 'required',
                'postcode' => 'required',



            ],
            [
                'firstname.required' => 'First name field is required',
                'lastname.required' => 'Last name field is required',
                'region.required' => 'Region field is required',
                'streetaddress.required' => 'Street address field is required',
                'city.required' => 'City field is required',
                'postcode.required' => 'Post code field is required',


            ]
        );
        $shipping = DB::table('user_shipping_address')->insertGetId([

            'user_id' => Auth::user()->id,
            'firstname' => $request->firstname,
            'lastname' => $request->lastname,
            'companyname' => $request->companyname,
            'region' => $request->region,
            'streetaddress' => $request->streetaddress,
            'city' => $request->city,
            'postcode' => $request->postcode,
            'country' => $request->country,



        ]);
        return redirect()->route('frontend.useraddress')->with('success', 'Shipping address added successfully');
    }

    public function edit()
    {
        $pageTitle = 'Alternative to HRT - Edit Shipping Address';
        $pagetitle = 'Edit Shipping Address';
        $shipping = DB::table('user_shipping_address')->where('user_id', Auth::user()->id)->first();
        return view('frontend.useraddress.shippingedit', compact('pageTitle', 'shipping','pagetitle'));
    }
    public function update(Request $request)
    {
        $request->validate(
            [
                'firstname' => 'required',
                'lastname' => 'required',
                'region' => 'required',
                'streetaddress' => 'required',
                'city' => 'required',
                'postcode' => 'required',



            ],
            [
                'firstname.required' => 'First name is required',
                'lastname.required' => 'Last name is required',
                'region.required' => 'Region is required',
                'streetaddress.required' => 'Street address is required',
                'city.required' => 'City is required',
                'postcode.required' => 'Post code is required',



            ]
        );
        $shipping = DB::table('user_shipping_address')->where('user_id', Auth::user()->id)->update([


            'user_id' => Auth::user()->id,
            'firstname' => $request->firstname,
            'lastname' => $request->lastname,
            'companyname' => $request->companyname,
            'region' => $request->region,
            'streetaddress' => $request->streetaddress,
            'city' => $request->city,
            'postcode' => $request->postcode,
            'country' => $request->country,

        ]);
        return redirect()->route('frontend.useraddress')->with('success', 'Shipping address updated successfully');
    }
}
