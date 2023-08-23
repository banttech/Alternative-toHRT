<?php

namespace App\Http\Controllers\Frontend;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use App\Models\User;
use Illuminate\Support\Facades\Mail;
use Symfony\Component\Mime\Email;
use Symfony\Component\Mime\Part\HtmlPart;
use DB;
use Illuminate\Support\Str;
use Carbon\Carbon;


class LoginController extends Controller
{
    
    public function registercreate()
    {
        $pageTitle = 'Alternative to HRT - Register';
        return view('frontend.auth.register',compact('pageTitle'));
    }
    public function registerstore(Request $request)
    {
        $request->validate(
            [
                'firstname' => 'required',
                'lastname' => 'required',
                'email' => 'required|email|unique:users,email',
                'password' => 'required|regex:/^(?=.*?[A-Z])(?=.*?[a-z])(?=.*?[0-9])(?=.*?[#?!@$%^&*-]).{8,}$/',
                'password_confirmation' => 'required|same:password',
                'g-recaptcha-response' => 'required',
            ],
            [
                'firstname.required' => 'First Name field is required',
                'lastname.required' => 'Last Name field is required',
                'email.required' => 'Email field is required',
                'email.email' => 'Email is invalid',
                'email.unique' => 'Email already exists',
                'password_confirmation.required' => 'Confirm Password field is required',
                'password_confirmation.same' =>'Password and Confirmation Password must be same',
                'password.required' => 'Password field is required',
                'password.regex' => 'Password must have at least 8 characters and contains uppercase letters, lowercase letters, numbers, and special characters.',
                'g-recaptcha-response.required' => 'Captcha is required',
            ]
        );

        $users = DB::table('users')->insertGetId([
         'email' => $request->email,
         'password' =>Hash::make($request->password),
         'firstname' => $request->firstname,
         'lastname' =>$request->lastname,
         'role_id' => '2',
        ]);

        // check if URL has redirect parameter then add it to the next url
        if ($request->input('redirect')) {
            return redirect()->route('frontend.login', ['redirect' => $request->input('redirect')])->with('success', 'You have been registered successfully. You can login now.');
        } else {
            return redirect()->route('frontend.login')->with('success', 'You have been registered successfully. You can login now.');
        }        

    }
    public function login(Request $request)
    {
     
        if ($request->method() == 'POST') {
            $request->validate([
                'email' => 'required|email',
                'password' => 'required',
                'g-recaptcha-response' => 'required',
            ], [
                'email.required' => 'Email is required',
                'email.email' => 'Email is invalid',
                'password.required' => 'Password is required',
                'g-recaptcha-response.required' => 'Captcha is required',
            ]);
           
            $credentials = $request->only('email', 'password');
           
            if (Auth::attempt($credentials)) {
                if (Auth::user()->role_id == '2') {
                    // check if URL has redirect parameter then and it is checkout then redirect to checkout page
                    if ($request->input('redirect') && $request->input('redirect') == 'checkout') {
                        return redirect()->route('checkout.index');
                    }
                    return redirect()->route('frontend.home');
                } else {
                    Auth::logout();
                    return redirect()->back()->with('error', 'Invalid Credentials');
                }
            } else {
                return redirect()->back()->with('error', 'Invalid Credentials');
            }
            
        } else{
            if(Auth::check()) {
                return redirect()->route('frontend.home');
            }
            $pageTitle = 'Alternative to HRT - Login';
            return view('frontend.auth.login',compact('pageTitle'));
        }
    }
    public function logout(){
        auth()->logout();
        return redirect()->route('frontend.home');
    }


    public function forgot(Request $request){
        if($request->method() == 'POST'){
            $request->validate(
                [
                'email' => 'required|email',
            ], [
                'email.required' => 'Email is required',
                'email.email' => 'Email is invalid',
            ]);
                  

            $user = User::where('email',$request->email)->first();
            if($user){
                // send random password to user of 8 characters
                $random_password = substr(str_shuffle('abcdefghijklmnopqrstuvwxyzABCDEFGHIJKLMNOPQRSTUVWXYZ0123456789') , 0 , 8 );
                $user->password = Hash::make($random_password);

                $userEmail = $user->email;
                $data = [
                    'email' => $user->email,
                    'password' => $random_password,
                ];                

                $token = Str::random(64);
                
                DB::table('password_reset')->insert([
                    'email' => $request->email, 
                    'token' => $token, 
                    'created_at' => Carbon::now()
                  ]);
                
                Mail::send('frontend.email.forgetPassword', ['token' => $token], function($message) use($request){
                    $message->to($request->email);
                    $message->subject('Reset Password');
                });

                $user->save();
                return redirect()->route('frontend.login')->with('success', 'Password reset email has been sent. A password reset email has been sent to the email address on file for your account, but may take several minutes to show up in your inbox. Please wait at least 10 minutes before attempting another reset.');
                // return redirect()->route('frontend.login')->with('success', 'Your temporary password has been sent to your email address.');
            } else {
                return redirect()->back()->with('error', 'Sorry, your email address is not in our system!');
            }
        }

        $pageTitle = "HRT - Forgot Password";
        return view('frontend.auth.forgot', compact('pageTitle'));
    }

       

        public function reset_password(Request $request, $token)
        {
            if ($request->method() == 'POST') {
                $request->validate([
                    'password' => 'required|min:8|confirmed',
                ],[
                    'password.required' => 'Password field is required',
                    'password.min' => 'Password must be at least 8 characters',
                    'password.confirmed' => 'New Password and Confirm Password must be same.',
                ]);

                $userdetail = DB::table('password_reset')->where('token', $token)->first();
                if (!$userdetail) {
                    return redirect()->back()->with('error', 'Invalid token. Please try again.');
                }

                $user = User::where('email', $userdetail->email)->first();
                if (!$user) {
                    return redirect()->back()->with('error', 'User not found. Please try again.');
                }

                $user->password = Hash::make($request->input('password'));
                $user->save();

                return redirect()->route('frontend.login')->with('success', 'Password reset successfully. You can now log in with your new password.');
            }

            $pageTitle = "Reset Password";
            return view('frontend.auth.confirm-password', compact('pageTitle', 'token'));
        }



}