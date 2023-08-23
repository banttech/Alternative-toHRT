<?php

namespace App\Http\Controllers\Frontend;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class UserDashboardController extends Controller
{
    public function index(){
        $pageTitle = 'Alternative to HRT - My Account';
        return view('frontend.userdashboard.dashboard',compact('pageTitle'));
    }
}
