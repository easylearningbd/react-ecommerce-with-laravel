<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AdminController; 

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



});