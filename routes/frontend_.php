<?php

use Illuminate\Support\Facades\Route;

use App\Http\Controllers\Frontend\HomeController;
use App\Http\Controllers\Frontend\AboutUsController;
use App\Http\Controllers\Frontend\ContactUsController;
use App\Http\Controllers\Frontend\ShopController;
use App\Http\Controllers\Frontend\WellnessBlogController;
use App\Http\Controllers\Frontend\LoginController;
use App\Http\Controllers\Frontend\FrontendBlogCategoryController;
use App\Http\Controllers\Frontend\UserDashboardController;
use App\Http\Controllers\Frontend\UserOrderController;
use App\Http\Controllers\Frontend\DownloadsController;
use App\Http\Controllers\Frontend\UserAccountController;
use App\Http\Controllers\Frontend\UserAddressController;
use App\Http\Controllers\Frontend\UserMyCouponController;
use App\Http\Controllers\Frontend\WishListController;
use App\Http\Controllers\Frontend\UserBillingController;
use App\Http\Controllers\Frontend\UserShippingController;
use App\Http\Controllers\Frontend\CartController;
use App\Http\Controllers\Frontend\CheckoutController;
use App\Http\Controllers\Frontend\PrivacyPolicyController;
use App\Http\Controllers\Frontend\TermsConditionController;
use App\Http\Controllers\Frontend\BlogCommentsController;
use App\Http\Controllers\Frontend\ApiController;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/
//for uer register
Route::get('/register', [LoginController::class, 'registercreate'])->name('frontend.register.create');
Route::post('/register', [LoginController::class, 'registerstore'])->name('frontend.register.store');
// for uer login
Route::match(['get', 'post'], '/login', [LoginController::class, 'login'])->name('frontend.login');
// for forget
Route::match(['get', 'post'], '/lost-password', [LoginController::class, 'forgot'])->name('frontend.forgot');
Route::match(['get', 'post'], '/reset-password/{token}', [LoginController::class, 'reset_password']);


//for home page
Route::get('/', [HomeController::class, 'index'])->name('frontend.home');

//for aboutus
Route::get('/aboutus', [AboutUsController::class, 'index'])->name('frontend.aboutus');
//for shop
Route::get('/shop', [ShopController::class, 'index'])->name('frontend.shop');
Route::get('/product/{slug}', [ShopController::class, 'product'])->name('frontend.product');
Route::get('/product-tag/{tags}', [ShopController::class, 'productTag'])->name('frontend.product.tag');
Route::get('/product-category/{slug}', [ShopController::class, 'productCategory'])->name('frontend.product.category');
Route::get('/product-brand/natural-juices', [ShopController::class, 'brand'])->name('frontend.productbrand');

// product search
Route::post('/search-products', [ShopController::class, 'searchProducts'])->name('searchProducts');

//for contactus
Route::get('/contactus', [ContactUsController::class, 'index'])->name('frontend.contactus');
Route::post('/contactus', [ContactUsController::class, 'store'])->name('frontend.contactus.store');
// for wellness blog
Route::get('/wellness-blog', [WellnessBlogController::class, 'index'])->name('frontend.blog');
Route::get('/author/{name}', [WellnessBlogController::class, 'author'])->name('frontend.author');
Route::get('/wellness-blog/{slug}', [WellnessBlogController::class, 'blog'])->name('frontend.blogpage');
// for blog category
Route::get('/category/{slug}', [FrontendBlogCategoryController::class, 'category'])->name('frontend.blogcategory');
// for blog tag
Route::get('/tag/{tags}', [WellnessBlogController::class, 'blogTag'])->name('frontend.blog.tag');
// Cart Routes
Route::get('/cart', [CartController::class, 'index'])->name('cart.index');
Route::post('/add-to-cart', [CartController::class, 'addToCart'])->name('cart.add');
Route::post('/remove-from-cart', [CartController::class, 'removeFromCart'])->name('cart.remove');
Route::post('/update-cart', [CartController::class, 'updateCart'])->name('cart.update');

// Cart Routes
Route::get('/checkout', [CheckoutController::class, 'index'])->name('checkout.index');
// post order_confirmation
Route::post('/save-order', [CheckoutController::class, 'saveOrder'])->name('checkout.save_order');

// PaymentSense
Route::get('/paymentSenseCheckout', [PaymentSenseController::class, 'paymentSenseCheckout'])->name('paymentSenseCheckout');
Route::post('/api/access-tokens', [ApiController::class, 'accessTokens'])->name('accessTokens');
Route::get('/api/payments/{id}', [ApiController::class, 'payments'])->name('payments');
Route::post('/api/cross-reference-payments/{id}', [ApiController::class, 'crossReferencePayments'])->name('crossReferencePayments');
Route::get('/collection', [PaymentSenseController::class, 'collection'])->name('collection');
Route::get('/pre-auth', [PaymentSenseController::class, 'preAuth'])->name('preAuth');
Route::get('/refund', [PaymentSenseController::class, 'refund'])->name('refund');
Route::get('/sale', [PaymentSenseController::class, 'sale'])->name('sale');
Route::post('/api/testFunction', [ApiController::class, 'testFunction'])->name('testFunction');
Route::get('/subscription', [PaymentSenseController::class, 'subscription'])->name('subscription');
Route::get('/void', [PaymentSenseController::class, 'void'])->name('void');
Route::get('/wallet', [PaymentSenseController::class, 'wallet'])->name('wallet');
Route::post('updatePaymentStatus', [PaymentSenseController::class, 'updatePaymentStatus'])->name('updatePaymentStatus');

// Payment Success
Route::post('orderFailedPaymentSense', [paymentSenseController::class, 'orderFailedPaymentSense'])->name('orderFailedPaymentSense');

//for privacy-policy
Route::get('/privacy-policy', [PrivacyPolicyController::class, 'index'])->name('frontend.privacy-policy');
//for terms-conditions
Route::get('/terms-conditions', [TermsConditionController::class, 'index'])->name('frontend.terms-conditions');

// for reply section
Route::post('/wellness-blog/comment/{id}', [BlogCommentsController::class, 'store'])->name('frontend.comment.store');

// apply.coupon
Route::post('/apply-coupon', [CartController::class, 'applyCoupon'])->name('cart.apply.coupon');
// remove.coupon
Route::post('/remove-coupon', [CartController::class, 'removeCoupon'])->name('cart.remove.coupon');

// here using middleware
Route::group(['middleware' => ['user']], function () {
    // for user dashboard
    Route::get('/my-account', [UserDashboardController::class, 'index'])->name('frontend.userdashboard');
    // for user orders
    Route::get('/my-account/orders', [UserOrderController::class, 'index'])->name('frontend.userorder');
    //for uerdownloads
    Route::get('/my-account/downloads', [DownloadsController::class, 'index'])->name('frontend.userdownload');
    //for user account
    Route::get('/my-account/edit-account', [UserAccountController::class, 'edit'])->name('frontend.useraccount');
    Route::post('/my-account/edit-account/{id}', [UserAccountController::class, 'update'])->name('frontend.useraccount.update');
    //for user address
    Route::get('/my-account/edit-address', [UserAddressController::class, 'index'])->name('frontend.useraddress');
    // Route::get('/my-account/add-address', [UserAddressController::class, 'create'])->name('frontend.useraddress.create');

    // for billing address
    Route::get('/my-account/add-address/billing', [UserBillingController::class, 'create'])->name('frontend.billing.create');
    Route::post('/my-account/add-address/billing', [UserBillingController::class, 'store'])->name('frontend.billing.store');
    Route::get('/my-account/edit-address/billing', [UserBillingController::class, 'edit'])->name('frontend.billing.edit');
    Route::post('/my-account/update-address/billing', [UserBillingController::class, 'update'])->name('frontend.billing.update');

    // for shipping address
    Route::get('/my-account/add-address/shipping', [UserShippingController::class, 'create'])->name('frontend.shipping.create');
    Route::post('/my-account/add-address/shipping', [UserShippingController::class, 'store'])->name('frontend.shipping.store');
    Route::get('/my-account/edit-address/shipping', [UserShippingController::class, 'edit'])->name('frontend.shipping.edit');
    Route::post('/my-account/update-address/shipping', [UserShippingController::class, 'update'])->name('frontend.shipping.update');

    // for user coupons
    Route::get('/my-account/my-coupons/', [UserMyCouponController::class, 'index'])->name('frontend.usercoupon');

    // for user wishlist
    Route::get('/my-account/wishlist/', [WishListController::class, 'index'])->name('frontend.userwishlist');
    // wishlist.add with post method
    Route::post('/add-to-wishlist', [WishListController::class, 'addToWishlist'])->name('frontend.userwishlist.add');
    // remove from wishlist
    Route::post('/remove-from-wishlist', [WishListController::class, 'removeFromWishlist'])->name('frontend.userwishlist.removeFromWishlist');


    // Route::get('/my-account/add-wishlist/{id}', [WishListController::class, 'addToWishlist'])->name('frontend.userwishlist.add');
    // Route::get('/myaccount/wishlist', [WishListController::class, 'checkToWishlist'])->name('frontend.userwishlist.check');
    Route::get('/my-account/wishlist/remove{id}', [WishListController::class, 'remove'])->name('frontend.userwishlist.remove');

    //usr logout
    Route::get('/logout', [LoginController::class, 'logout'])->name('frontend.logout');
});