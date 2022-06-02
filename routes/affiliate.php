<?php

/*
|--------------------------------------------------------------------------
| Affiliate Routes
|--------------------------------------------------------------------------
|
| Here is where you can register admin routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

//Admin
Route::group(['prefix' =>'admin', 'middleware' => ['auth', 'admin']], function(){
    Route::get('/affiliate', 'App\Http\Controllers\AffiliateController@index')->name('affiliate.index');
    Route::post('/affiliate/affiliate_option_store', 'App\Http\Controllers\AffiliateController@affiliate_option_store')->name('affiliate.store');

    Route::get('/affiliate/configs', 'App\Http\Controllers\AffiliateController@configs')->name('affiliate.configs');
    Route::post('/affiliate/configs/store', 'App\Http\Controllers\AffiliateController@config_store')->name('affiliate.configs.store');

    Route::get('/affiliate/users', 'App\Http\Controllers\AffiliateController@users')->name('affiliate.users');
    Route::get('/affiliate/verification/{id}', 'App\Http\Controllers\AffiliateController@show_verification_request')->name('affiliate_users.show_verification_request');

    Route::get('/affiliate/approve/{id}', 'App\Http\Controllers\AffiliateController@approve_user')->name('affiliate_user.approve');
	Route::get('/affiliate/reject/{id}', 'App\Http\Controllers\AffiliateController@reject_user')->name('affiliate_user.reject');

    Route::post('/affiliate/approved', 'App\Http\Controllers\AffiliateController@updateApproved')->name('affiliate_user.approved');

    Route::post('/affiliate/payment_modal', 'App\Http\Controllers\AffiliateController@payment_modal')->name('affiliate_user.payment_modal');
    Route::post('/affiliate/pay/store', 'App\Http\Controllers\AffiliateController@payment_store')->name('affiliate_user.payment_store');

    Route::get('/affiliate/payments/show/{id}', 'App\Http\Controllers\AffiliateController@payment_history')->name('affiliate_user.payment_history');
    Route::get('/refferal/users', 'App\Http\Controllers\AffiliateController@refferal_users')->name('refferals.users');

    // Affiliate Withdraw Request
    Route::get('/affiliate/withdraw_requests', 'App\Http\Controllers\AffiliateController@affiliate_withdraw_requests')->name('affiliate.withdraw_requests');
    Route::post('/affiliate/affiliate_withdraw_modal', 'App\Http\Controllers\AffiliateController@affiliate_withdraw_modal')->name('affiliate_withdraw_modal');
    Route::post('/affiliate/withdraw_request/payment_store', 'App\Http\Controllers\AffiliateController@withdraw_request_payment_store')->name('withdraw_request.payment_store');
    Route::get('/affiliate/withdraw_request/reject/{id}', 'App\Http\Controllers\AffiliateController@reject_withdraw_request')->name('affiliate.withdraw_request.reject');

    Route::get('/affiliate/logs', 'App\Http\Controllers\AffiliateController@affiliate_logs_admin')->name('affiliate.logs.admin');


});

//FrontEnd
Route::get('/affiliate', 'App\Http\Controllers\AffiliateController@apply_for_affiliate')->name('affiliate.apply');
Route::post('/affiliate/store', 'App\Http\Controllers\AffiliateController@store_affiliate_user')->name('affiliate.store_affiliate_user');
Route::get('/affiliate/user', 'App\Http\Controllers\AffiliateController@user_index')->name('affiliate.user.index');
Route::get('/affiliate/user/payment_history', 'App\Http\Controllers\AffiliateController@user_payment_history')->name('affiliate.user.payment_history');
Route::get('/affiliate/user/withdraw_request_history', 'App\Http\Controllers\AffiliateController@user_withdraw_request_history')->name('affiliate.user.withdraw_request_history');

Route::get('/affiliate/payment/settings', 'App\Http\Controllers\AffiliateController@payment_settings')->name('affiliate.payment_settings');
Route::post('/affiliate/payment/settings/store', 'App\Http\Controllers\AffiliateController@payment_settings_store')->name('affiliate.payment_settings_store');

// Affiliate Withdraw Request
Route::post('/affiliate/withdraw_request/store', 'App\Http\Controllers\AffiliateController@withdraw_request_store')->name('affiliate.withdraw_request.store');
