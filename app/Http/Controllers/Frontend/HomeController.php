<?php

namespace App\Http\Controllers\Frontend;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use DB;

class HomeController extends Controller
{
    public function index(Request $request){
        $pageTitle = 'Alternative to HRT - Home';
        // check if search value is not empty
        if ($request->search) {
            // if search is this Natural Herbal Alternative to Taking HRT – Pack of 4 Bottles then don't get Natural Herbal Alternative to Taking HRT this product apply this type of search
            $products = DB::table('product')->where('productname', 'like', '%' . $request->search . '%')->where('status','Active')->get();

            // unique tags from all products
            $tags = DB::table('product')->select('tags')->distinct()->get();
            $productCategorys = DB::table('productcategory')->orderBy('id', 'asc')->get();
            
            return view('frontend.shop.index', compact('products','productCategorys','tags'));
        }

        $success_stories = DB::table('success_stories')->orderBy('id', 'desc')->take(3)->get();
        $wellness_blogs = DB::table('wellness_blog')->orderBy('date', 'asc')->take(3)->get();
        $products = DB::table('product')->orderBy('id', 'asc')->where('status','Active')->take(4)->get();
      
        
        return view('frontend.index',compact('success_stories','wellness_blogs','products','pageTitle'));
    }
   
}
