<?php

use App\Http\Controllers\ShopController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Auth\AuthenticatedSessionController;
use App\Http\Controllers\Auth\ConfirmablePasswordController;
use App\Http\Controllers\Auth\EmailVerificationNotificationController;
use App\Http\Controllers\Auth\EmailVerificationPromptController;
use App\Http\Controllers\Auth\NewPasswordController;
use App\Http\Controllers\Auth\PasswordController;
use App\Http\Controllers\Auth\PasswordResetLinkController;
use App\Http\Controllers\Auth\RegisteredUserController;
use App\Http\Controllers\Auth\VerifyEmailController;
use App\Http\Controllers\CartController;
use App\Http\Controllers\DashboardUserController;
use App\Http\Controllers\LikesController;
use App\Http\Controllers\WelcomeController;
use App\Models\Like;

Route::get('/', [WelcomeController::class, 'index'])->name('/home');

Route::get('/deliver-and-pay', function () {
    return view('deliver-and-payment');
})->name('/deliver-and-payment');

Route::get('/shop', [ShopController::class, 'index'])->name('/shop');
Route::get('/shop/show/{id}', [ShopController::class, 'show'])->name('/shop/show/{id}');

Route::get('/dashboard', function () {
        return view('dashboard');
    })->name('dashboard')->middleware('auth');

Route::get('/dashboard-your-orders', [DashboardUserController::class, 'your_orders'])->name('/dashboard-your-orders')->middleware('auth');
Route::get('/dashboard-settings', [DashboardUserController::class, 'dashboard_settings'])->name('/dashboard-settings')->middleware('auth');
Route::get('/dashboard-logout', [DashboardUserController::class, 'logout'])->name('/dashboard-logout')->middleware('auth');

Route::get('/cart', [CartController::class, 'index'])->name('/cart')->middleware('auth');
Route::get('/cart-add/{id}', [CartController::class, 'add'])->name('/cart-add');
Route::get('/cart-increment/{id}', [CartController::class, 'increment'])->name('/cart-increment')->middleware('auth');
Route::get('/cart-decrement/{id}', [CartController::class, 'decrement'])->name('/cart-decrement')->middleware('auth');
Route::get('/cart-delete/{id}', [CartController::class, 'delete'])->name('/cart-delete')->middleware('auth');

Route::get('/checkout', [CartController::class, 'checkout'])->name('/checkout')->middleware('auth');
Route::post('/checkout/store', [CartController::class, 'makeorder'])->name('/checkout/store')->middleware('auth');

Route::get('/your-likes', [LikesController::class, 'index'])->name('/your-likes')->middleware('auth')->middleware('auth');
Route::post('/shop/like/{id_product}/{id_user}', [LikesController::class, 'like'])->name('/shop/like/{id_product}/{id_user}')->middleware('auth');
Route::post('/shop/dislike/{id_product}/{id_user}', [LikesController::class, 'dislike'])->name('/shop/dislike/{id_product}/{id_user}')->middleware('auth');

Route::middleware('guest')->group(function () {
    Route::get('register', [RegisteredUserController::class, 'create'])
                ->name('register');

    Route::post('register', [RegisteredUserController::class, 'store']);

    Route::get('login', [AuthenticatedSessionController::class, 'create'])
                ->name('login');

    Route::post('login', [AuthenticatedSessionController::class, 'store']);

    Route::get('forgot-password', [PasswordResetLinkController::class, 'create'])
                ->name('password.request');

    Route::post('forgot-password', [PasswordResetLinkController::class, 'store'])
                ->name('password.email');

    Route::get('reset-password/{token}', [NewPasswordController::class, 'create'])
                ->name('password.reset');

    Route::post('reset-password', [NewPasswordController::class, 'store'])
                ->name('password.store');
});

Route::middleware('auth')->group(function () {
    Route::get('verify-email', EmailVerificationPromptController::class)
                ->name('verification.notice');

    Route::get('verify-email/{id}/{hash}', VerifyEmailController::class)
                ->middleware(['signed', 'throttle:6,1'])
                ->name('verification.verify');

    Route::post('email/verification-notification', [EmailVerificationNotificationController::class, 'store'])
                ->middleware('throttle:6,1')
                ->name('verification.send');

    Route::get('confirm-password', [ConfirmablePasswordController::class, 'show'])
                ->name('password.confirm');

    Route::post('confirm-password', [ConfirmablePasswordController::class, 'store']);

    Route::put('password', [PasswordController::class, 'update'])->name('password.update');

    Route::post('logout', [AuthenticatedSessionController::class, 'destroy'])
                ->name('logout');
});