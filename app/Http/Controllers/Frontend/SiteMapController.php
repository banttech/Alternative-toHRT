<?php

namespace App\Http\Controllers\Frontend;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use DB;

class SiteMapController extends Controller
{
    public function siteMap(){

        $pageTitle = 'Alternative to HRT - Sitemap';
        $products = DB::table('product')->get();
        $wellnessBlogs = DB::table('wellness_blog')->get();
        $blogCategorys = DB::table('blogcategory')->get();
        $productCategorys = DB::table('productcategory')->get();
       
        return view('frontend.siteMap.siteMap',compact('products','pageTitle','wellnessBlogs','blogCategorys','productCategorys'));
    }
}
