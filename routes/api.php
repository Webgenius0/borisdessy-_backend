<?php

use App\Http\Controllers\Api\Auth\LoginController;
use App\Http\Controllers\Api\CardController;
use App\Http\Controllers\Api\CategoryController;
use App\Http\Controllers\Api\ReviewController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Api\SocialAuthController;
use App\Http\Controllers\Api\Auth\RegisterController;
use App\Http\Controllers\Api\BlogController;
use App\Http\Controllers\Api\OrderController;
use App\Http\Controllers\Api\TransactionHistoryController;
use App\Http\Controllers\Api\UserController;
use App\Http\Controllers\Api\WalletController;
use App\Models\TransactionHistory;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "api" middleware group. Make something great!
|
*/


//Social Login
Route::post('/social-login', [SocialAuthController::class, 'socialLogin']);

//Register API
Route::controller(RegisterController::class)->prefix('users/register')->group(function () {
    // User Register
    Route::post('/', 'userRegister');

    // Verify OTP
    Route::post('/otp-verify', 'otpVerify');

    // Resend OTP
    Route::post('/otp-resend', 'otpResend');
});

//Login API
Route::controller(LoginController::class)->prefix('users/login')->group(function () {

    // User Login
    Route::post('/', 'userLogin');

    // Verify Email
    Route::post('/email-verify', 'emailVerify');

    // Resend OTP
    Route::post('/otp-resend', 'otpResend');

    // Verify OTP
    Route::post('/otp-verify', 'otpVerify');

    //Reset Password
    Route::post('/reset-password', 'resetPassword');
});

Route::group(['middleware' => ['jwt.verify']], function() {

    Route::controller(UserController::class)->prefix('users')->group(function () {
        Route::get('/data', 'userData');
        Route::post('/data/update', 'userUpdate');
        Route::post('/logout', 'logoutUser');
        Route::delete('/delete', 'deleteUser');
        Route::post('/update-avatar', 'updateAvatar');
    });

    Route::controller(ReviewController::class)->prefix('review')->group(function(){
        Route::post('/store','StoreReview');
    });

});

// public api for all cards

Route::controller(CardController::class)->group(function(){
    Route::get('all/cards','allCards');
    Route::get('filter/cards','filterCards');
    Route::get('upcoming-vouchers','upcomingVouchers');
    Route::get('upcoming-cards','upcomingCards');
    Route::get('card-details','cardDetails');

    // global search
    Route::get('global-search','globalSearch');
});

// public api for all ratings

Route::controller(ReviewController::class)->group(function(){
    Route::get('all-rating','allRating');
});

/**
 * public api for all blogs
 * 
 */

 Route::controller(BlogController::class)->group(function(){
     Route::get('all/blogs','allBlogs');
 });


 /**
  * user wallet api
  */

  Route::group(['middleware' => ['jwt.verify']], function() {

    Route::controller(WalletController::class)->prefix('users')->group(function () {
        Route::get('user-balance', 'UserBalance');
     
    });

});

/**
 * User Order History
 */

  Route::group(['middleware' => ['jwt.verify']], function() {

    Route::controller(OrderController::class)->prefix('users')->group(function () {
        Route::post('create-order', 'createOrder');
        Route::get('order-history', 'orderHistory');

     
    });

});


/**
 * User Transaction History
 */

  Route::group(['middleware' => ['jwt.verify']], function() {

    Route::controller(TransactionHistoryController::class)->prefix('users')->group(function () {
        Route::get('transaction-history', 'transactionHistory');
     
    });

});