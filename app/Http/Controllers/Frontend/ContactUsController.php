<?php

namespace App\Http\Controllers\Frontend;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use DB;

class ContactUsController extends Controller
{
    public function index()
    {
        $pageTitle = 'Alternative to HRT - Contact Us';
        return view('frontend.contactus.index',compact('pageTitle'));
    }
    public function store(Request $request)
    {
        $validated = $request->validate(
            [
                'name' => 'required',
                'email' => 'required',
                'message' => 'required',
            ],
            [
                'name.required' => 'Name field is required',
                'email.required' => 'Email field is required',
                'message.required' => 'Message field is required',
            ]
        );

        DB::table('contactus')->insert([
            'name' => $request->name,
            'email' => $request->email,
            'message' => $request->message,
        ]);
        return redirect()->back()->with('success', 'Form submit successfully');
    }
}
