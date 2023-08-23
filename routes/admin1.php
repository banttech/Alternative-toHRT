<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\TestController;
use App\Http\Controllers\Admin\SuccessStoriesController;
use App\Http\Controllers\Admin\WellnessBlogController;
use App\Http\Controllers\Admin\LoginController;
use App\Http\Controllers\Admin\ContactUsController;
use App\Http\Controllers\Admin\BlogCategoryController;
use App\Http\Controllers\Admin\UserListController;
use App\Http\Controllers\Admin\ProductController;
use App\Http\Controllers\Admin\BrandController;
use App\Http\Controllers\Admin\CouponController;
use App\Http\Controllers\Admin\CountryController;
use App\Http\Controllers\Admin\PrivacyPolicyController;
use App\Http\Controllers\Admin\TermsConditionController;
use App\Http\Controllers\Admin\BlogCommentsController;
use App\Http\Controllers\Admin\AdminProfileController;

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
//for login
Route::get('/admin', [LoginController::class, 'index'])->name('admin');

// Route::group(['prefix' => 'admin','as','admin.','namespace' => 'admin'], function () {
Route::group(['prefix' => 'admin'], function () {
    Route::post('/login', [LoginController::class, 'signin'])->name('admin.login');
    Route::get('/login', [LoginController::class, 'signin'])->name('admin.signin');
   
});
Route::group(['prefix' => 'admin'], function () {
  Route::match(['get', 'post'], '/lost-password', [LoginController::class, 'forgot'])->name('admin.forgot');
  Route::match(['get', 'post'], '/resets-password/{token}', [LoginController::class, 'reset_password']);
   
});

Route::group(['prefix' => 'admin','middleware' => ['auth','admin']], function () {
    Route::get('/logout', [LoginController::class, 'logout'])->name('admin.logout');
    Route::get('/dashboard', [TestController::class, 'test'])->name('admin.test');

    //for success stories
    Route::get('success_stories', [SuccessStoriesController::class, 'index'])->name('success_stories');
    Route::get('add/success_stories', [SuccessStoriesController::class, 'create'])->name('success_stories.create');
    Route::post('add/success_stories', [SuccessStoriesController::class, 'store'])->name('success_stories.store');
    Route::get('/success_stories/edit/{id}', [SuccessStoriesController::class, 'edit'])->name('success_stories.edit');
    Route::post('/success_stories/update/{id}', [SuccessStoriesController::class, 'update'])->name('success_stories.update');
    Route::get('/success_stories/delete/{id}', [SuccessStoriesController::class, 'delete'])->name('success_stories.delete');

    //for wellness blog
    Route::get('blogs', [WellnessBlogController::class, 'index'])->name('wellness_blog');
    Route::get('add/blog', [WellnessBlogController::class, 'create'])->name('wellness_blog.create');
    Route::post('add/blog', [WellnessBlogController::class, 'store'])->name('wellness_blog.store');
    Route::get('/blog/edit/{id}', [WellnessBlogController::class, 'edit'])->name('wellness_blog.edit');
    Route::post('/blog/update/{id}', [WellnessBlogController::class, 'update'])->name('wellness_blog.update');
    Route::get('/blog/delete/{id}', [WellnessBlogController::class, 'delete'])->name('wellness_blog.delete');

    // for contact us
    Route::get('contact', [ContactUsController::class, 'index'])->name('contact');
    Route::get('/contacts/delete/{id}', [ContactUsController::class, 'delete'])->name('contact.delete');

// for blog category

  Route::get('blogcategory', [BlogCategoryController::class, 'index'])->name('blogcategory');
  Route::get('add/blogcategory', [BlogCategoryController::class, 'create'])->name('blogcategory.create');
  Route::post('add/blogcategory', [BlogCategoryController::class, 'store'])->name('blogcategory.store');
  Route::get('/blogcategory/edit/{id}', [BlogCategoryController::class, 'edit'])->name('blogcategory.edit');
  Route::post('/blogcategory/update/{id}', [BlogCategoryController::class, 'update'])->name('blogcategory.update');
  Route::get('/blogcategory/delete/{id}', [BlogCategoryController::class, 'delete'])->name('blogcategory.delete');

// for user list
  Route::get('user', [UserListController::class, 'index'])->name('user');
  Route::get('add/user', [UserListController::class, 'create'])->name('user.create');
  Route::post('add/user', [UserListController::class, 'store'])->name('user.store');
  Route::get('/user/edit/{id}', [UserListController::class, 'edit'])->name('user.edit');
  Route::post('/user/update/{id}', [UserListController::class, 'update'])->name('user.update');
  Route::get('/user/delete/{id}', [UserListController::class, 'delete'])->name('user.delete');

  //for product

  Route::get('product', [ProductController::class, 'index'])->name('product');
  Route::get('add/product', [ProductController::class, 'create'])->name('product.create');
  Route::post('add/product', [ProductController::class, 'store'])->name('product.store');
  Route::get('/product/edit/{id}', [ProductController::class, 'edit'])->name('product.edit');
  Route::post('/product/update/{id}', [ProductController::class, 'update'])->name('product.update');
  Route::get('/product/delete/{id}', [ProductController::class, 'delete'])->name('product.delete');

  
  //for product

  Route::get('brand', [BrandController::class, 'index'])->name('brand');
  Route::get('add/brand', [BrandController::class, 'create'])->name('brand.create');
  Route::post('add/brand', [BrandController::class, 'store'])->name('brand.store');
  Route::get('/brand/edit/{id}', [BrandController::class, 'edit'])->name('brand.edit');
  Route::post('/brand/update/{id}', [BrandController::class, 'update'])->name('brand.update');
  Route::get('/brand/delete/{id}', [BrandController::class, 'delete'])->name('brand.delete');


  // coupon routes
  Route::get('/coupon', [CouponController::class, 'index'])->name('coupon');
  Route::get('/add/coupon', [CouponController::class, 'create'])->name('coupon.create');
  Route::post('/store/coupon', [CouponController::class, 'store'])->name('coupon.store');
  Route::get('/coupon/edit/{id}', [CouponController::class, 'edit'])->name('coupon.edit');
  Route::post('/coupon/update/{id}', [CouponController::class, 'update'])->name('coupon.update');
  Route::get('/coupon/delete/{id}', [CouponController::class, 'delete'])->name('coupon.delete');

   // for countries
  Route::get('countries', [CountryController::class, 'index'])->name('country');
  Route::get('add/country', [CountryController::class, 'create'])->name('country.create');
  Route::post('add/country', [CountryController::class, 'store'])->name('country.store');
  Route::get('/country/edit/{id}', [CountryController::class, 'edit'])->name('country.edit');
  Route::post('/country/update/{id}', [CountryController::class, 'update'])->name('country.update');
  Route::get('/country/delete/{id}', [CountryController::class, 'delete'])->name('country.delete');


// for privacy policy

//Route::get('privacy-policy', [PrivacyPolicyController::class, 'index'])->name('privacy-policy');
Route::get('add/privacy-policy', [PrivacyPolicyController::class, 'create'])->name('privacy-policy.create');
Route::post('add/privacy-policy', [PrivacyPolicyController::class, 'store'])->name('privacy-policy.store');
Route::get('/privacy-policy/edit/{id}', [PrivacyPolicyController::class, 'edit'])->name('privacy-policy.edit');
Route::post('/privacy-policy/update/{id}', [PrivacyPolicyController::class, 'update'])->name('privacy-policy.update');
//Route::get('/privacy-policy/delete/{id}', [PrivacyPolicyController::class, 'delete'])->name('privacy-policy.delete');


//  for terms and conditions

//Route::get('terms-conditions', [TermsConditionController::class, 'index'])->name('terms-conditions');
Route::get('add/terms-conditions', [TermsConditionController::class, 'create'])->name('terms-conditions.create');
Route::post('add/terms-conditions', [TermsConditionController::class, 'store'])->name('terms-conditions.store');
Route::get('/terms-conditions/edit/{id}', [TermsConditionController::class, 'edit'])->name('terms-conditions.edit');
Route::post('/terms-conditions/update/{id}', [TermsConditionController::class, 'update'])->name('terms-conditions.update');
//Route::get('/terms-conditions/delete/{id}', [TermsConditionController::class, 'delete'])->name('terms-conditions.delete');
//  for comments
Route::get('blog/comments', [BlogCommentsController::class, 'index'])->name('comment');
Route::get('/blog/comment/approved/{id}', [BlogCommentsController::class, 'approved'])->name('comment.approved');
Route::get('/blog/comment/disapproved/{id}', [BlogCommentsController::class, 'disapproved'])->name('comment.disapproved');
Route::get('/blog/comment/delete/{id}', [BlogCommentsController::class, 'delete'])->name('comment.delete');

//  for comments
Route::get('edit-profile', [AdminProfileController::class, 'edit'])->name('admin.profile.edit');
Route::post('edit-profile', [AdminProfileController::class, 'update'])->name('admin.profile.update');
Route::get('edit-password', [AdminProfileController::class, 'editPassword'])->name('admin.edit.password');
Route::post('update-password', [AdminProfileController::class, 'updatePassword'])->name('admin.update.password');

});
