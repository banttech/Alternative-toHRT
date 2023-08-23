<?php

namespace App\Http\Controllers\Frontend;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use DB;

class ShopController extends Controller
{
    public function index()
    {
        $pageTitle = 'Alternative to HRT - Shop';
        //$products = DB::table('product')->orderBy('id', 'asc')->where('status','Active')->get();
       //dd($products);
        $productCategorys = DB::table('productcategory')->orderBy('id', 'asc')->get();
        
        return view('frontend.shop.index', compact('productCategorys','pageTitle'));
    }
    public function product($slug)
    {
        
        $products = DB::table('product')->where('slug', $slug)->first();
        $pageTitle = 'Alternative to HRT - ' .$products->productname;
        $allProducts =  DB::table('product')->orderBy('id', 'asc')->wherenot('slug', $slug)->take(3)->get();
        $categorys = DB::table('productcategory')->where('id', $products->product_category_id)->first();
        $brands = DB::table('brand')->where('id', $products->brand_id)->first();

        // dd($allProducts);
        return view('frontend.shop.productpage', compact('allProducts', 'slug', 'pageTitle', 'products', 'categorys', 'brands'));
    }
    public function brand()
    {
        return redirect()->route('frontend.shop');
    }
    public function productTag($results)
    {
        $pageTitle ='Alternative to HRT - '. $results;
       // $products = DB::table('product')->where('tags', $tags)->get(); 
        $allProducts = DB::table('product')->where('tags', 'like', '%' . $results . '%')->where('status','Active')->get();
        $allTags = DB::table('product')->where('status','Active')->get();

        //dd($allProducts);    
       // $tags = DB::table('product')->select('tags')->distinct()->get();
        $productCategorys = DB::table('productcategory')->orderBy('id', 'asc')->get();
        
        return view('frontend.shop.productTag',compact('pageTitle','allTags','productCategorys','allProducts','results'));
    }

    public function productCategory(Request $request , $slug)
    {
      
        $category = DB::table('productcategory')->where('slug', $slug)->first();
        $pageTitle = 'Alternative to HRT - '.$category->categoryname;
        $products = DB::table('product')->where('product_category_id', $category->id)->where('status','Active')->get();
        //$productCategorys = DB::table('productcategory')->orderBy('id', 'asc')->get();
        $productCategorys = DB::table('productcategory')->distinct()->get();
        $allProducts = DB::table('product')->where('tags', 'like', '%' .$request->results . '%')->where('status','Active')->get();

        return view('frontend.shop.productCategory',compact('products','pageTitle','productCategorys','allProducts','category'));
    }

    public function searchProducts(Request $request)
    {
        $searchValue = $request->searchValue;
        $products = DB::table('product')->where('productname', 'like', '%' . $searchValue . '%')->where('status','Active')->get();
        $output = '';
        $output = view('frontend.shop.productSearchResults', compact('products'))->render();
        return response()->json(['status' => 1, 'data' => $output]);
    }


}
