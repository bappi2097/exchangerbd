<?php

use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;

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

Route::get('/', 'GuestController@index')->name('guest');

Route::get('/how-to-exchange', function () {
    if (Auth::check()) {
        return view('users.howtoexchange', ['user' => Auth::user()]);
    }
    return view('users.howtoexchange');
})->name('how-to-exchange');

Route::get('/faq', function () {
    if (Auth::check()) {
        return view('users.faq', ['user' => Auth::user()]);
    }
    return view('users.faq');
})->name('faq');

// Auth::routes(['verify' => true]);
Auth::routes();

Route::get('password/reset', 'ResetPasswordController@showResetForm')->name('password.request')->middleware('auth');
Route::post('password/reset', 'ResetPasswordController@reset')->name('password.update')->middleware('auth');
Route::get('password/email', 'ForgetPasswordController@showForgetPasswordForm')->name('password.email');
Route::post('password/email', 'ForgetPasswordController@sendResetLinkEmail')->name('password.email');

Route::prefix('DLa58NMd3HNxuGw')->name('admin.')->group(function () {
    Route::get('/login', 'Auth\AdminLoginController@showAdminLoginForm')->name('login-get');
    Route::post('/login', 'Auth\AdminLoginController@adminLogin')->name('login-post');
    Route::post('/logout', 'Auth\AdminLoginController@logout')->name('logout');
    Route::get('/register', 'Auth\RegisterController@showAdminRegisterForm')->name('register-get');
    Route::post('/register', 'Auth\RegisterController@createAdmin')->name('register-post');
});

Route::get('/home', 'HomeController@index')->name('home')->middleware(['auth', 'isactive']);

Route::middleware(['auth', 'isactive'])->prefix('user')->name('user.')->group(function () {
    Route::get('/profile', 'UserController@edit')->name('edit');
    Route::put('/update', 'UserController@update')->name('update');
    Route::post('/feedback', 'FeedbackController@update')->name('feedback');
    Route::post('place-order', 'OrderController@store')->name('place-order');
    Route::get('history', 'OrderController@index')->name('history');
});

Route::prefix('ajax')->name('ajax.')->group(function () {
    Route::get('feedback', 'AjaxController@getFeedback')->name('get-feedback');
    Route::get('wallet', 'AjaxController@getWallet')->name('get-wallet');
    Route::post('wallet-option', 'AjaxController@postWalletOption')->name('post-wallet-option');
    Route::post('currency-conversion', 'AjaxController@postCurrencyConversation')->name('post-currency-conversion');
});
// Route::resource('/', 'UserController', ['parameters' => ['' => 'id']]);

Route::middleware('auth:admin')->prefix('DLa58NMd3HNxuGw')->name('admin.')->group(function () {

    Route::get('/dashboard', 'AdminDashboardController@index')->name('dashboard');


    Route::prefix('feedback')->name('feedback.')->group(function () {
        Route::get("/", 'AdminFeedbackController@index')->name('index');
        Route::put("/{feedback}", 'AdminFeedbackController@update')->name('update')->middleware("auth:admin");
        Route::delete("/{feedback}", 'AdminFeedbackController@destroy')->name('destroy');
    });

    Route::prefix('wallet')->name('wallet.')->group(function () {
        Route::get('/', 'AdminWalletController@index')->name('index');
        Route::post('/', 'AdminWalletController@store')->name('store');
        Route::put('/', 'AdminWalletController@update')->name('update');
        Route::delete('/{id}', 'AdminWalletController@destroy')->name('destroy');
    });

    Route::prefix('wallet-accounts')->name('wallet-accounts.')->group(function () {
        Route::get('/', 'AdminWalletAccountController@index')->name('index');
        Route::post('/', 'AdminWalletAccountController@store')->name('store');
        Route::put('/', 'AdminWalletAccountController@update')->name('update');
        Route::delete('/{id}', 'AdminWalletAccountController@destroy')->name('destroy');
    });

    Route::prefix('new-order')->name('new-order.')->group(function () {
        Route::get('/', 'AdminNewOrderController@index')->name('index');
        // Route::post('/', 'AdminNewOrderController@store')->name('store');
        Route::put('/{id}', 'AdminNewOrderController@update')->name('update');
        Route::put('/{id}/reject', 'AdminNewOrderController@reject')->name('reject');
        Route::delete('/{id}', 'AdminNewOrderController@destroy')->name('destroy');
    });

    Route::prefix('complete-order')->name('complete-order.')->group(function () {
        Route::get('/', 'AdminCompleteOrderController@index')->name('index');
    });

    Route::prefix('password-reset')->name('password-reset.')->group(function () {
        Route::get('/', 'AdminPasswordResetController@index')->name('index');
    });

    Route::prefix('customer-info')->name('customer-info.')->group(function () {
        Route::get('/', 'AdminCustomerInfoController@index')->name('index');
        Route::put('/ban/{id}', 'AdminCustomerInfoController@ban')->name('ban');
    });

    Route::prefix('notice')->name('notice.')->group(function () {
        Route::get('/', 'AdminNoticeController@index')->name('index');
        Route::post('/', 'AdminNoticeController@store')->name('store');
        Route::put('/', 'AdminNoticeController@update')->name('update');
        Route::delete('/{id}', 'AdminNoticeController@destroy')->name('destroy');
    });

    Route::prefix('mail')->name('mail.')->group(function () {
        Route::post('/', 'MailController@sendMail')->name('send-mail');
    });
});
