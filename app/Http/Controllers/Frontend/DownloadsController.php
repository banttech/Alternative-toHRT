<?php

namespace App\Http\Controllers\Frontend;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class DownloadsController extends Controller
{
    public function index(){
        
        $pageTitle = 'Alternative to HRT - Downloads';
        $pagetitle = 'Downloads';
        return view('frontend.userdownloads.download',compact('pageTitle','pagetitle'));
    }
}
