<?php

namespace App\Http\Controllers\Frontend;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use DB;

class PrivacyPolicyController extends Controller
{
    public function index(){
        $pageTitle = 'Alternative to HRT - Privacy Policy';
        $privacy_policy = DB::table('privacy_policy')->orderBy('id', 'desc')->first();
        return view('frontend.privacy_policy.index',compact('privacy_policy','pageTitle'));
    }
}
 