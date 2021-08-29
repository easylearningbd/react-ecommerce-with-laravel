<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AdminController; 
use App\Http\Controllers\Admin\CategoryController; 
use App\Http\Controllers\Admin\SliderController; 
use App\Http\Controllers\Admin\ProductListController; 
use App\Http\Controllers\Admin\ContactController; 

use App\Http\Controllers\Admin\ReviewController; 
use App\Http\Controllers\Admin\SiteInfoController; 
use App\Http\Controllers\Admin\ProductCartController; 


/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::get('/', function () {
    return view('welcome');
});

Route::middleware(['auth:sanctum', 'verified'])->get('/dashboard', function () {
    return view('admin.index');
})->name('dashboard');
 
  // Admin Logout Routes 
Route::get('/logout',[AdminController::class, 'AdminLogout'])->name('admin.logout');

Route::prefix('admin')->group(function(){

Route::get('/user/profile',[AdminController::class, 'UserProfile'])->name('user.profile');

Route::post('/user/profile/store',[AdminController::class, 'UserProfileStore'])->name('user.profile.store');

Route::get('/change/password',[AdminController::class, 'ChangePassword'])->name('change.password');

Route::post('/change/password/update',[AdminController::class, 'ChangePasswordUpdate'])->name('change.password.update');

});


Route::prefix('category')->group(function(){

Route::get('/all',[CategoryController::class, 'GetAllCategory'])->name('all.category');

Route::get('/add',[CategoryController::class, 'AddCategory'])->name('add.category');

Route::post('/store',[CategoryController::class, 'StoreCategory'])->name('category.store');

Route::get('/edit/{id}',[CategoryController::class, 'EditCategory'])->name('category.edit');

Route::post('/update',[CategoryController::class, 'UpdateCategory'])->name('category.update');
 
Route::get('/delete/{id}',[CategoryController::class, 'DeleteCategory'])->name('category.delete');
});



Route::prefix('subcategory')->group(function(){

Route::get('/all',[CategoryController::class, 'GetAllSubCategory'])->name('all.subcategory');

Route::get('/add',[CategoryController::class, 'AddSubCategory'])->name('add.subcategory');

Route::post('/store',[CategoryController::class, 'StoreSubCategory'])->name('subcategory.store');

Route::get('/edit/{id}',[CategoryController::class, 'EditSubCategory'])->name('subcategory.edit');

Route::post('/update',[CategoryController::class, 'UpdateSubCategory'])->name('subcategory.update');
 
Route::get('/delete/{id}',[CategoryController::class, 'DeleteSubCategory'])->name('subcategory.delete');
});



Route::prefix('slider')->group(function(){

Route::get('/all',[SliderController::class, 'GetAllSlider'])->name('all.slider');

Route::get('/add',[SliderController::class, 'AddSlider'])->name('add.slider');

Route::post('/store',[SliderController::class, 'StoreSlider'])->name('slider.store');

Route::get('/edit/{id}',[SliderController::class, 'EditSlider'])->name('slider.edit');

Route::post('/update',[SliderController::class, 'UpdateSlider'])->name('slider.update');
 
Route::get('/delete/{id}',[SliderController::class, 'DeleteSlider'])->name('slider.delete');
});



Route::prefix('product')->group(function(){

Route::get('/all',[ProductListController::class, 'GetAllProduct'])->name('all.product');

Route::get('/add',[ProductListController::class, 'AddProduct'])->name('add.product');

Route::post('/store',[ProductListController::class, 'StoreProduct'])->name('product.store');

Route::get('/edit/{id}',[ProductListController::class, 'EditProduct'])->name('product.edit');

Route::post('/update',[SliderController::class, 'UpdateSlider'])->name('slider.update');
 
Route::get('/delete/{id}',[SliderController::class, 'DeleteSlider'])->name('slider.delete');
});

/// Contact Message Route 
Route::get('/all/message',[ContactController::class, 'GetAllMessage'])->name('contact.message');

Route::get('/message/delete/{id}',[ContactController::class, 'DeleteMessage'])->name('message.delete');

/// Product Review Route 
Route::get('/all/review',[ReviewController::class, 'GetAllReview'])->name('all.review');

/// Site Info Route 
Route::get('/getsite/info',[SiteInfoController::class, 'GetSiteInfo'])->name('getsite.info');

Route::post('/update/siteinfo',[SiteInfoController::class, 'UpdateSiteInfo'])->name('update.siteinfo');


Route::prefix('order')->group(function(){

Route::get('/pending',[ProductCartController::class, 'PendingOrder'])->name('pending.order');

Route::get('/processing',[ProductCartController::class, 'ProcessingOrder'])->name('processing.order');

Route::get('/complete',[ProductCartController::class, 'CompleteOrder'])->name('complete.order');

Route::get('/details/{id}',[ProductCartController::class, 'OrderDetails'])->name('order.details');

Route::get('/status/processing/{id}',[ProductCartController::class, 'PendingToProcessing'])->name('pending.processing');

Route::get('/status/complete/{id}',[ProductCartController::class, 'ProcessingToComplete'])->name('processing.complete');

 
});