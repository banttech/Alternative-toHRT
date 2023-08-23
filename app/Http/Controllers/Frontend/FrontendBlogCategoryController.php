<?php

namespace App\Http\Controllers\Frontend;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use DB;

class FrontendBlogCategoryController extends Controller
{
    public function category(Request $request, $slug)
    {

        $blogcategorys = DB::table('blogcategory')->where('slug', $slug)->first();
       
        $pageTitle = 'Alternative to HRT - '.$blogcategorys->categoryname;
       
        $blogs = DB::table('wellness_blog')->where('category_id', $blogcategorys->id)->get();
        $categorynames = DB::table('blogcategory')->get();
          
        return view('frontend.blogcategory.blogcategory',compact('blogcategorys','blogs','categorynames','pageTitle'));

    }
}
