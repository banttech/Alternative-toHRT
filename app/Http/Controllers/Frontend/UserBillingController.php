<?php

namespace App\Http\Controllers\Frontend;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use DB;

class UserBillingController extends Controller
{
  public function create()
  {
    
    $billing = DB::table('user_billing_address')->where('user_id', Auth::user()->id)->first();
    if ($billing) {
      return redirect()->route('frontend.useraddress');
    } else {
      $pageTitle = 'Alternative to HRT - Add Billing Address';
      $pagetitle = 'Add Billing Address';
      return view('frontend.useraddress.billingcreate', compact('pageTitle','pagetitle'));
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
        'phone' => 'required',
        'email' => 'required|email',


      ],
      [
        'firstname.required' => 'First name field is required',
        'lastname.required' => 'Last name field is required',
        'region.required' => 'Region field is required',
        'streetaddress.required' => 'Street address field is required',
        'city.required' => 'City field is required',
        'postcode.required' => 'Post code field is required',
        'phone.required' => 'Phone number field is required',
        'email.required' => 'Email field is required',
        'email.email' => 'Email is invalid',

      ]
    );
    $biling = DB::table('user_billing_address')->insertGetId([


      'user_id' => Auth::user()->id,
      'firstname' => $request->firstname,
      'lastname' => $request->lastname,
      'companyname' => $request->companyname,
      'region' => $request->region,
      'streetaddress' => $request->streetaddress,
      'city' => $request->city,
      'postcode' => $request->postcode,
      'phone' => $request->phone,
      'country' => $request->country,
      'email' => $request->email,


    ]);
    return redirect()->route('frontend.useraddress')->with('success', 'Billing address added successfully');
  }
  public function edit()
  {
    $pageTitle = 'Alternative to HRT - Edit Billing Address';
    $pagetitle = 'Edit Billing Address';
    $billing = DB::table('user_billing_address')->where('user_id', Auth::user()->id)->first();
    return view('frontend.useraddress.billingedit', compact('pageTitle','billing','pagetitle'));
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
        'phone' => 'required',
        'email' => 'required|email',


      ],
      [
        'firstname.required' => 'First name field is required',
        'lastname.required' => 'Last name field is required',
        'region.required' => 'Region field is required',
        'streetaddress.required' => 'Street address field is required',
        'city.required' => 'City field is required',
        'postcode.required' => 'Post code field is required',
        'phone.required' => 'Phone number field is required',
        'email.required' => 'Email is required',
        'email.email' => 'Email is invalid',

      ]
    );
    $biling = DB::table('user_billing_address')->where('user_id', Auth::user()->id)->update([

      'user_id' => Auth::user()->id,
      'firstname' => $request->firstname,
      'lastname' => $request->lastname,
      'companyname' => $request->companyname,
      'region' => $request->region,
      'streetaddress' => $request->streetaddress,
      'city' => $request->city,
      'postcode' => $request->postcode,
      'phone' => $request->phone,
      'country' => $request->country,
      'email' => $request->email,
    ]);
    return redirect()->route('frontend.useraddress')->with('success', 'Billing address updated successfully');
  }
}
