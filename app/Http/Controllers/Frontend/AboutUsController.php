<?php

namespace App\Http\Controllers\Frontend;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class AboutUsController extends Controller
{
   public function index(){
      $pageTitle = 'Alternative to HRT - About Us';
    return view('frontend.aboutus.index',compact('pageTitle'));
   }
}
