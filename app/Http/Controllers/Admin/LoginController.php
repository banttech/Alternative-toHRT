<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Models\User;
use Illuminate\Support\Facades\Mail;
use Illuminate\Support\Facades\Hash;
use Symfony\Component\Mime\Email;
use Symfony\Component\Mime\Part\HtmlPart;
use DB;
use Illuminate\Support\Str;
use Carbon\Carbon;

class LoginController extends Controller
{

    public function reset_password(Request $request, $token)
{
    if ($request->method() == 'POST') {
        $request->validate([
            'password' => 'required|min:8|confirmed',
        ], [
            'password.required' => 'Password field is required',
            'password.min' => 'Password must be at least 8 characters',
            'password.confirmed' => 'Password and confirm password must be same',
        ]);

        $userdetail = DB::table('password_reset')->where('token', $token)->first();
        if (!$userdetail) {
            return redirect()->back()->with('error', 'Invalid token. Please try again.');
        }

        $user = User::where('email', $userdetail->email)->where('role_id', 1)->first();
        if (!$user) {
            return redirect()->back()->with('error', 'User not found. Please try again.');
        }

        $user->password = Hash::make($request->input('password'));
        $user->save();

        return redirect()->route('admin.login')->with('success', 'Password reset successfully. You can now log in with your new password.');
    }

    $pageTitle = "Reset Password";
    return view('admin.login.resetpassword', compact('pageTitle', 'token'));
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
                  

            $user = User::where('email',$request->email)->where('role_id',1)->first();
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
                
                Mail::send('admin.email.forgetPassword', ['token' => $token], function($message) use($request){
                    $message->to($request->email);
                    $message->subject('Reset Password');
                });

                $user->save();

                return redirect()->route('admin.login')->with('success', 'Password reset email has been sent to your email address. Please check your email.'); 
            } else {
                return redirect()->back()->with('error', 'Sorry, your email address is not in our system!');
            }
        }

        $pageTitle = "HRT - Forgot Password";
        return view('admin.login.forgot', compact('pageTitle'));
    }



    public function index()
    {
        if(Auth::check()){
            return redirect()->route('admin.test');
        }  
        else{
            if (auth()->check() && auth()->user()->role_id != '1') {
                return redirect()->back();
            }
        }
      
        return view('admin.login.index');
    }

    public function signin(Request $request)
    {
        
    
        if ($request->isMethod('post')) {

        $request->validate([
            'email' => 'required|email',
            'password' => 'required',
        ], [
            'email.required' => 'Email field is required',
            'email.email' => 'Email is invalid',
            'password.required' => 'Password field is required',
        ]);

        $credentials = $request->only('email', 'password');

        // dd($credentials);
        // die;
        if (Auth::attempt($credentials)) {
            if (Auth::user()->role_id == '1') {
                return redirect()->route('admin.test');
            } else {
                Auth::logout();
                return redirect()->back()->with('error', 'Invalid Credentials');
            }
        } else {
            return redirect()->back()->with('error', 'Invalid Credentials');
        }
    }
    else{


    if(Auth::check()) {
        return redirect()->route('admin.test');
    }
    return view('admin.login.index');
}

}

    public function logout()
    {
        Auth::logout();
        return redirect()->route('admin');
    }
}
