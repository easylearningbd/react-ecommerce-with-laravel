<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AdminController; 
use App\Http\Controllers\Admin\CategoryController; 
use App\Http\Controllers\Admin\SliderController; 




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

Route::get('/edit/{id}',[CategoryController::class, 'EditSubCategory'])->name('subcategory.edit');

Route::post('/update',[CategoryController::class, 'UpdateSubCategory'])->name('subcategory.update');
 
Route::get('/delete/{id}',[CategoryController::class, 'DeleteSubCategory'])->name('subcategory.delete');
});