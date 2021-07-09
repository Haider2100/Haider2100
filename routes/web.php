<?php

use App\Http\Controllers\Admin\AdminAuthController;
use App\Http\Controllers\Admin\AdminWorkController;
use App\Http\Controllers\ChartController;
use App\Http\Controllers\UserAuthController;
use App\Http\Controllers\UserHomeController;
use App\Http\Controllers\UserRegisterController;
use Illuminate\Support\Facades\Route;

//Route::get('/', function () {
//    return view('welcome');
//});

Route::get('/set-session-var',[UserAuthController::class,'setSessionVar'])->name('setSessionVar');


//----------------USER NOT AUTH ROUTE
Route::get('/',[UserAuthController::class,'welcome'])->name('user.welcome');
Route::get('/login',[UserAuthController::class,'showLogin'])->name('user.login.show');
Route::post('/login',[UserAuthController::class,'login'])->name('user.login');
Route::get('/logout',[UserAuthController::class,'Logout'])->name('user.logout');

Route::get('/register',[UserRegisterController::class,'showRegister'])->name('user.register.show');
Route::post('/register',[UserRegisterController::class,'register'])->name('user.register');

Route::get('/email-verify/{email}/{token}',[UserRegisterController::class,'verifyEmail'])->name('user.emailVerify');

//----------------USER AUTH ROUTE
Route::group(['middleware'=>'userAuth'],function (){
    Route::get('/home',[UserHomeController::class,'pieChart'])->name('user.home');
    Route::get('/upload',[UserHomeController::class,'showUpload'])->name('user.upload.show');
    Route::post('/upload',[UserHomeController::class,'upload'])->name('user.upload');
    Route::get('/gallery/{status}',[UserHomeController::class,'showGallery'])->name('user.gallery.show');
    Route::get('/sell-request/{image}',[UserHomeController::class,'sellRequest'])->name('user.sell.request');
    Route::get('/financial/{status}',[UserHomeController::class,'showFinancial'])->name('user.financial.show');
    Route::get('/cashout',[UserHomeController::class,'cashout'])->name('user.cashout');
    Route::get('/profile',[UserHomeController::class,'showProfile'])->name('user.profile.show');
    Route::post('/profile',[UserHomeController::class,'saveProfile'])->name('user.profile');
    Route::get('/msg',[UserHomeController::class,'showMsg'])->name('user.msg.show');
});

//----------------ADMIN ROUTE
Route::get('admin/login',[AdminAuthController::class,'showLogin'])->name('admin.login.show');
Route::post('admin/login',[AdminAuthController::class,'login'])->name('admin.login');
Route::get('admin/logout',[AdminAuthController::class,'logout'])->name('admin.logout');

Route::group(['prefix'=>'admin','middleware'=>'adminAuth'],function (){
    Route::get('/dashboard',[AdminAuthController::class,'dashboard'])->name('admin.dashboard');
    Route::get('/approve',[AdminWorkController::class,'showPendingImage'])->name('admin.approve.show');
    Route::get('/approve/{image}/{status}',[AdminWorkController::class,'approveStatus'])->name('admin.approve.status');
    Route::get('/buyout',[AdminWorkController::class,'showSellingPhotos'])->name('admin.sellingPhotos');
    Route::post('/buyout',[AdminWorkController::class,'buyout'])->name('admin.buyout');
    Route::get('/cashouts',[AdminWorkController::class,'showCashoutRequest'])->name('admin.cashout.show');
    Route::get('/cashouts/{cashoutId}/{status}',[AdminWorkController::class,'executeCashout'])->name('admin.cashout');
    Route::get('/gallery/{status}',[AdminWorkController::class,'showGallery'])->name('admin.gallery.show');
    Route::get('/cashoutsummary',[AdminWorkController::class,'showCashoutSummary'])->name('admin.cashout.summary');
    Route::get('/cashoutshistory',[AdminWorkController::class,'showCashoutHistory'])->name('admin.cashout.history');
});
