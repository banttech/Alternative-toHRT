<?php

namespace App\Http\Controllers\Frontend;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use DB;

class UserAccountController extends Controller
{
    public function edit()
    {
        $pageTitle = 'Alternative to HRT - Account Details';
        $pagetitle = 'Account Details';
        return view('frontend.useraccount.useraccount',compact('pageTitle','pagetitle'));
    }
    public function update(Request $request, $id)
    {
        if ($request->old_password || $request->password || $request->password_confirmation) {

            $validated = $request->validate(
                [
                    'firstname' => 'required',
                    'lastname' => 'required',  
                    'old_password' => 'required',   
                    'email' => 'required|email|unique:users,email,'.$id,
                    //'password' => 'required|regex:/[@$!%*#?&]/|regex:/[A-Z]/',
                    'password' => 'required|regex:/^(?=.*?[A-Z])(?=.*?[a-z])(?=.*?[0-9])(?=.*?[#?!@$%^&*-]).{8,}$/',
                    'password_confirmation' => 'required|same:password',

                ],
                [
                    'firstname.required' => 'First Name field is required',
                    'lastname.required' => 'Last Name field is required',

                    'password_confirmation.required' => 'Confirm Password field is required',
                    'password_confirmation.same' =>'New Password and Confirmation Password must be same',
                    'password.required' => 'New Password field is required',
                    'password.regex' => 'New Password must have at least 8 characters and contains uppercase letters, lowercase letters, numbers,    and special characters.',
                    'old_password.required' => 'Current Password field is required',
                   
                    'email.required' => 'Email field is required',
                    'email.email' => 'Email is invalid',
                     'email.unique' => 'Email already exists',
                    
                ]
            );
            if (Hash::check($request->old_password, Auth::user()->password)) {
                $users = DB::table('users')->where('id', $id)->update([
                    'firstname' => $request->firstname,
                    'lastname' => $request->lastname,
                    'email' => $request->email,
                    'password' => Hash::make($request->password),
                ]);
            } else {
                return redirect()->back()->with('error', 'Please enter your valid old password');
            }
        } else {
            $validated = $request->validate(
                [
                    'firstname' => 'required',
                    'lastname' => 'required',
                    'email' => 'required|email|unique:users,email,'.$id,


                ],
                [
                    'firstname.required' => 'First Name field is required',
                    'lastname.required' => 'Last Name field is required',
                    'email.required' => 'Email field is required',
                    'email.email' => 'Email is invalid',
                    'email.unique' => 'Email already exists',

                ]
            );
            $users = DB::table('users')->where('id', $id)->update([
                'firstname' => $request->firstname,
                'lastname' => $request->lastname,
                'email' => $request->email,
                'password' =>Auth::user()->password,
            ]);
        }
        return redirect()->back()->with('error', 'Account details updated successfully');
    }
}


