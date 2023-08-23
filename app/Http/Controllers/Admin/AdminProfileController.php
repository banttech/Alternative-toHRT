<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use DB;


class AdminProfileController extends Controller
{
    public function edit()
    {
        $pageTitle = 'Alternative to HRT - Edit Profile';

        return view('admin.adminProfile.adminProfile',compact('pageTitle'));

    }

    public function update(Request $request)
    {

        $validated = $request->validate(
            [
                'firstname' => 'required',
                'lastname' => 'required',
                'email' => 'required|email',
                'image' => 'image|mimes:jpg,png,jpeg|max:2048|dimensions:max_width=200,max_height=200ad',

            ],
            [
                'firstname.required' => 'First Name field is required',
                'lastname.required' => 'Last Name field is required',
                'email.required' => 'Email field is required',
                'email.email' => 'Email is invalid',
                'image.dimensions' => "Image size can't exceeds the size 200px X 200px",
                'mimes' => 'Please upload valid image. Only JPG, JPEG and PNG extensions are allowed.',

            ]
        );

        $oldAdmin = DB::table('users')->where('id', Auth::user()->id)->first();

        $image = '';

        if ($request->file('image')) {
            $image = $request->file('image');
            $name = time() . '_wellness_blog.' . $image->getClientOriginalExtension();

            $destinationPath = public_path('admin_assets/images');
            $image->move($destinationPath, $name);
            $image = $name;
        } else {
            $image = $oldAdmin->image;
        }

        $admin = DB::table('users')->where('id', Auth::user()->id)->update([
            'firstname' => $request->firstname,
            'lastname' => $request->lastname,
            'email' => $request->email,
            'image' => $image,
        ]);
        return redirect()->back()->with('success', 'Profile edit successfully');
    }

    public function editPassword()
    {

        $pageTitle = 'Alternative to HRT - Edit Password';
        return view('admin.adminProfile.editPassword',compact('pageTitle'));
    }



    public function updatePassword(Request $request)
    {
        // if ($request->old_password || $request->new_pass || $request->confirm_pass) {

            $validated = $request->validate(
                [
                   
                    
                    'old_password' => 'required',
                    'password' => 'required|regex:/^(?=.*?[A-Z])(?=.*?[a-z])(?=.*?[0-9])(?=.*?[#?!@$%^&*-]).{8,}$/',
                    'password_confirmation' => 'required|same:password',
                ],
                [
                    'password_confirmation.same' =>'New Password and Confirmation Password must be same',
                    'password.required' => 'Password field is required',
                    'old_password.required' => 'Current Password field is required',
                    'password.regex' => 'Password must have at least 8 characters and contains uppercase letters, lowercase letters, numbers, and special characters.',
                ]
            );
            if (Hash::check($request->old_password, Auth::user()->password)) {
                $users = DB::table('users')->where('id',Auth::user()->id)->update([
                    'password' => Hash::make($request->password),
                ]);
                return redirect()->back()->with('success', 'Password updated successfully');
            } else {
                return redirect()->back()->with('error', 'Please enter your valid current password');
            }
        }
    }
// }