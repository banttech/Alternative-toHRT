<?php

namespace App\Http\Controllers\Frontend;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use DB;

class WishListController extends Controller
{
    public function index()
    {
        $pageTitle = 'Alternative to HRT - Wishlist';
        $pagetitle = 'Wishlist'; 
        $wishlists = DB::table('wish_list')->where('user_id', Auth::user()->id)->get();

        return view('frontend.userwishlist.userwishlist', compact('wishlists','pageTitle','pagetitle'));
    }

    public function addToWishlist(Request $request)
    {
        // check if user is logged in or not if logged in then add product to wishlist table else add to session
        if (Auth::check()) {
            $wishlist = DB::table('wish_list')->insertGetId([
                'user_id' => Auth::user()->id,
                'product_id' => $request->id,
            ]);
            $product = DB::table('product')->where('id', $request->id)->first();
            $message = $product->productname . ' is added to the Wishlist';
            $shopProducts = view('frontend.shop.shopProducts')->render();
            $wishListItems = view('frontend.shop.wishlistItems')->render();
            return response()->json(['message' => $message, 'shopProducts' => $shopProducts, 'wishListItems' => $wishListItems]);
        } else {
            return redirect()->route('frontend.home');
        }
    }

    public function checkToWishlist()
    {

        $wishlists = DB::table('wish_list')->where('user_id', Auth::user()->id)->get();

        return view('frontend.userwishlist.userwishlist', compact('wishlists'));
    }

    public function remove($id)
    {
        DB::table('wish_list')->where('product_id', $id)->delete();
        return redirect()->back()->with('success', 'Removed successfully');
    }

    public function removeFromWishlist(Request $request)
    {
        $message = '';
        $wishlist = DB::table('wish_list')->where('id', $request->id)->first();
        $product = DB::table('product')->where('id', $wishlist->product_id)->first();
        DB::table('wish_list')->where('id', $request->id)->delete();
        $message = $product->productname . ' is removed from the Wishlist';
        $shopProducts = view('frontend.shop.shopProducts')->render();
        $wishListItems = view('frontend.shop.wishlistItems')->render();
        return response()->json(['message' => $message, 'shopProducts' => $shopProducts, 'wishListItems' => $wishListItems]);
    }
}
