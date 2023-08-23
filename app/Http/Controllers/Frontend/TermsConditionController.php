<?php

namespace App\Http\Controllers\Frontend;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use DB;

class TermsConditionController extends Controller
{
    public function index(){
        $pageTitle = 'Alternative to HRT - Terms And Conditions';
        $terms_conditions = DB::table('terms_conditions')->first();
        return view('frontend.terms_conditions.index',compact('terms_conditions','pageTitle'));
    }
}
