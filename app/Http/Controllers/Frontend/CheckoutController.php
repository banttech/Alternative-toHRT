<?php

namespace App\Http\Controllers\Frontend;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Models\Order;
use App\Models\OrderItem;
use App\Models\Product;
use Illuminate\Support\Facades\DB;

class CheckoutController extends Controller
{
    public function index()
    {
        $pageTitle = 'Alternative to HRT - Checkout';
        return view('frontend.checkout.checkout',compact('pageTitle'));
    }

    // orderConfirmation
    public function saveOrder(Request $request)
    {
        $order = new Order();
        $order->user_id = Auth::user()->id;
        $order->bill_first_name = $request->bill_first_name;
        $order->bill_last_name = $request->bill_last_name;
        $order->bill_company_name = $request->bill_company_name;
        $order->bill_country_region = $request->bill_country_region;
        $order->bill_address1 = $request->bill_address1;
        $order->bill_address2 = $request->bill_address2;
        $order->bill_town_city = $request->bill_town_city;
        $order->bill_county = $request->bill_county;
        $order->bill_postcode = $request->bill_postcode;
        $order->bill_phone_number = $request->bill_phone_number;
        $order->bill_email = $request->bill_email;
        $order->ship_to_diff_address = $request->ship_to_diff_address;

        // check if ship to different address is checked then save the shipping address
        // if ($request->ship_to_diff_address == 'true') {
        $order->ship_first_name = $request->ship_first_name ? $request->ship_first_name : $request->bill_first_name;
        $order->ship_last_name = $request->ship_last_name ? $request->ship_last_name : $request->bill_last_name;
        $order->ship_company_name = $request->ship_company_name ? $request->ship_company_name : $request->bill_company_name;
        $order->ship_country_region = $request->ship_country_region ? $request->ship_country_region : $request->bill_country_region;
        $order->ship_address1 = $request->ship_address1 ? $request->ship_address1 : $request->bill_address1;
        $order->ship_address2 = $request->ship_address2 ? $request->ship_address2 : $request->bill_address2;
        $order->ship_town_city = $request->ship_town_city ? $request->ship_town_city : $request->bill_town_city;
        $order->ship_county = $request->ship_county ? $request->ship_county : $request->bill_county;
        $order->ship_postcode = $request->ship_postcode ? $request->ship_postcode : $request->bill_postcode;
        // }
        $order->payment_method = $request->payment_method;
        $order->payment_order_id = $request->payment_order_id;
        $order->total_amount = $request->total_amount;
        $order->coupon_code = $request->coupon_code;
        $order->coupon_discount_percentage = $request->coupon_discount_percentage;
        $order->coupon_amount = $request->coupon_amount;
        $order->created_at = date('Y-m-d H:i:s');
        $order->updated_at = date('Y-m-d H:i:s');
        $order->save();

        // get all the cart items and save them in order_items table
        $cart = session()->get('cart');
        foreach ($cart as $item) {
            $orderItem = new OrderItem();
            $orderItem->order_id = $order->id;
            $orderItem->product_id = $item['id'];
            $productDetails = Product::find($item['id']);
            $orderItem->reg_price = $productDetails->reg_sel_price;
            $orderItem->sel_price = $item['price'];
            $orderItem->image = $item['image'];
            $orderItem->category_id = $productDetails->category_id;
            $orderItem->brand_id = $productDetails->brand_id;
            $orderItem->quantity = $item['quantity'];
            $orderItem->created_at = date('Y-m-d H:i:s');
            $orderItem->updated_at = date('Y-m-d H:i:s');
            $orderItem->save();
        }

        // check if user_billing_address is not present of this user then save the billing address
        $userBillingAddress = DB::table('user_billing_address')->where('user_id', Auth::user()->id)->first();
        if (is_null($userBillingAddress)) {
            $userBillingAddress = DB::table('user_billing_address')->insert([
                'user_id' => Auth::user()->id,
                'firstname' => $request->bill_first_name,
                'lastname' => $request->bill_last_name,
                'companyname' => $request->bill_company_name,
                'region' => $request->bill_country_region,
                'streetaddress' => $request->bill_address1,
                'city' => $request->bill_town_city,
                'country' => $request->bill_county,
                'postcode' => $request->bill_postcode,
                'phone' => $request->bill_phone_number,
                'email' => $request->bill_email,
            ]);
        }
        // check if user_shipping_address is not present of this user then save the shipping address if ship to different address is checked
        // if ($request->ship_to_diff_address == 'true') {
            $userShippingAddress = DB::table('user_shipping_address')->where('user_id', Auth::user()->id)->first();
            if (is_null($userShippingAddress)) {
                if($request->ship_first_name == null || $request->ship_last_name == null || $request->ship_company_name == null || $request->ship_country_region == null || $request->ship_address1 == null || $request->ship_town_city == null || $request->ship_county == null || $request->ship_postcode == null){
                    $userShippingAddress = DB::table('user_shipping_address')->insert([
                        'user_id' => Auth::user()->id,
                        'firstname' => $request->bill_first_name,
                        'lastname' => $request->bill_last_name,
                        'companyname' => $request->bill_company_name,
                        'region' => $request->bill_country_region,
                        'streetaddress' => $request->bill_address1,
                        'city' => $request->bill_town_city,
                        'country' => $request->bill_county,
                        'postcode' => $request->bill_postcode,
                    ]);
                }
            }
        // }

        // remove the cart items from session
        session()->put('cart', []);
        session()->forget('coupon');
        session()->save();

        // json response with success message
        return response()->json([
            'status' => 'success'
        ]);
    }
}
