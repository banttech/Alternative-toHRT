<?php

namespace App\Http\Controllers\Frontend;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\Product;
use App\Models\Coupon;
use DB;

class CartController extends Controller
{
    public function index()
    {
        $pageTitle = 'Alternative to HRT - Cart';
        return view('frontend.cart.cart',compact('pageTitle'));
    }

    public function addToCart(Request $request)
    {
        $product = Product::find($request->id);
        $cart = session()->get('cart');

        // if cart is empty then this the first product
        if (!$cart) {
            $cart = [
                $request->id => [
                    "id" => $product->id,
                    "name" => $product->productname,
                    "quantity" => $request->quantity,
                    "price" => $product->price,
                    "image" => $product->image,
                    'slug' => $product->slug
                ]
            ];
            session()->put('cart', $cart);
            $totalItems = 0;
            foreach ($cart as $item) {
                $totalItems += $item['quantity'];
            }

            $message = $product->productname . ' was added to the cart';
            $image = $product->image;
            $prodcutName = $product->productname;
            $totalPrice = 0;
            foreach ($cart as $item) {
                $totalPrice += $item['price'] * $item['quantity'];
            }
            $totalPrice = number_format((float)$totalPrice, 2, '.', '');
            $slug = $product->slug;
            return response()->json(['message' => $message, 'totalItems' => $totalItems, 'image' => $image, 'prodcutName' => $prodcutName, 'totalPrice' => $totalPrice, 'slug' => $slug]);
        }

        // if cart not empty then check if this product exist then increment quantity
        if (isset($cart[$request->id])) {
            $cart[$request->id]['quantity'] = $cart[$request->id]['quantity'] + $request->quantity;
            // $cart[$request->id]['quantity']++;
            session()->put('cart', $cart);
            $totalItems = 0;
            foreach ($cart as $item) {
                $totalItems += $item['quantity'];
            }

            $message = $product->productname . ' quantity updated successfully!';
            $image = $product->image;
            $prodcutName = $product->productname;
            $totalPrice = 0;
            foreach ($cart as $item) {
                $totalPrice += $item['price'] * $item['quantity'];
            }
            $totalPrice = number_format((float)$totalPrice, 2, '.', '');
            $slug = $product->slug;
            return response()->json(['message' => $message, 'totalItems' => $totalItems, 'image' => $image, 'prodcutName' => $prodcutName, 'totalPrice' => $totalPrice, 'slug' => $slug]);
        }

        // if item not exist in cart then add to cart with quantity = 1
        $cart[$request->id] = [
            "id" => $product->id,
            "name" => $product->productname,
            "quantity" => $request->quantity,
            "price" => $product->price,
            "image" => $product->image,
            'slug' => $product->slug
        ];
        session()->put('cart', $cart);
        $totalItems = 0;
        foreach ($cart as $item) {
            $totalItems += $item['quantity'];
        }

        $message = $product->productname . ' was added to the cart';
        $image = $product->image;
        $prodcutName = $product->productname;
        $totalPrice = 0;
        foreach ($cart as $item) {
            $totalPrice += $item['price'] * $item['quantity'];
        }
        $totalPrice = number_format((float)$totalPrice, 2, '.', '');
        $slug = $product->slug;
        return response()->json(['message' => $message, 'totalItems' => $totalItems, 'image' => $image, 'prodcutName' => $prodcutName, 'totalPrice' => $totalPrice, 'slug' => $slug]);
    }

    // remove from cart functionality using session
    public function removeFromCart(Request $request)
    {
        if ($request->id) {
            $cart = session()->get('cart');
            $removeItemName = '';
            if (isset($cart[$request->id])) {
                $removeItemName = $cart[$request->id]['name'];
                unset($cart[$request->id]);
                session()->put('cart', $cart);
            }
            $totalItems = 0;
            $cartPageHtml = '';
            foreach ($cart as $item) {
                $totalItems += $item['quantity'];
            }
            if ($totalItems == 0) {
                session()->forget('coupon');
                $cartPageHtml = view('frontend.cart.empty-cart')->render();

            }
            $cartItemsList = view('frontend.cart.cart-items')->render();
            $cartSubTotalSec = view('frontend.cart.cart-subtotal')->render();
            $cartTotalSec = view('frontend.cart.cart-total')->render();
            $message = $removeItemName . ' removed';
            return response()->json(['message' => $message, 'totalItems' => $totalItems, 'cartItemsList' => $cartItemsList, 'cartSubTotalSec' => $cartSubTotalSec, 'cartTotalSec' => $cartTotalSec, 'cartPageHtml' => $cartPageHtml]);
        }
    }

    // update cart functionality using session
    public function updateCart(Request $request)
    {
        $items = $request->input('items');

        if ($items && count($items) > 0) {
            foreach ($items as $item) {
                $cart = session()->get('cart');
                $cart[$item['id']]['quantity'] = $item['quantity'];
                session()->put('cart', $cart);
            }
            $totalItems = 0;
            foreach ($cart as $item) {
                $totalItems += $item['quantity'];
            }
            $cartItemsList = view('frontend.cart.cart-items')->render();
            $cartSubTotalSec = view('frontend.cart.cart-subtotal')->render();
            $cartTotalSec = view('frontend.cart.cart-total')->render();
            return response()->json(['message' => 'Cart updated successfully!', 'totalItems' => $totalItems, 'cartItemsList' => $cartItemsList, 'cartSubTotalSec' => $cartSubTotalSec, 'cartTotalSec' => $cartTotalSec]);
        }
    }

    public function applyCoupon(Request $request)
    {
        // check if coupon code is valid
        $coupon = Coupon::where('code', $request->couponCode)->first();
        if(is_null($coupon)) {
            return response()->json(['message' => 'Invalid coupon code!', 'status' => 0]);
        }

        // check if coupon is active or not
        if($coupon->status == 'inactive') {
            return response()->json(['message' => 'Coupon code is not active!', 'status' => 0]);
        }

        // check if coupon is expired
        if($coupon->valid_to < date('Y-m-d')) {
            return response()->json(['message' => 'Coupon code is expired!', 'status' => 0]);
        }

        // check if usage_allowed is limited then check if coupon is used more than usage_allowed times or not from orders table
        if($coupon->usage_allowed == 'limited') {
            $couponUsedCount = DB::table('orders')->where('coupon_code', $request->couponCode)->count();
            if($couponUsedCount >= $coupon->usage_limit) {
                return response()->json(['message' => 'Coupon code is expired!', 'status' => 0]);
            }
        }

        // check if coupon is already used by this user or not
        $couponUsedByUser = DB::table('orders')->where('coupon_code', $request->couponCode)->where('user_id', auth()->user()->id)->count();
        if($couponUsedByUser > 0) {
            return response()->json(['message' => 'Coupon code is already used!', 'status' => 0]);
        }

        // check if coupon is already applied or not
        $checkCoupon = session()->get('coupon');
        if($checkCoupon) {
            return response()->json(['message' => 'Coupon code is already applied!', 'status' => 0]);
        }

        // if coupon is valid then apply coupon
        $coupon = [
            'code' => $request->couponCode,
            'discount_percentage' => $coupon->discount_percentage,
        ];
        session()->put('coupon', $coupon);
        $cartSubTotalSec = view('frontend.cart.cart-subtotal')->render();
        $cartTotalSec = view('frontend.cart.cart-total')->render();
        return response()->json(['message' => 'Coupon code applied successfully!', 'status' => 1, 'cartSubTotalSec' => $cartSubTotalSec, 'cartTotalSec' => $cartTotalSec]);
    }

    public function removeCoupon(Request $request)
    {
        session()->forget('coupon');
        $cartSubTotalSec = view('frontend.cart.cart-subtotal')->render();
        $cartTotalSec = view('frontend.cart.cart-total')->render();
        return response()->json(['message' => 'Coupon code removed successfully!', 'cartSubTotalSec' => $cartSubTotalSec, 'cartTotalSec' => $cartTotalSec]);
    }
}
