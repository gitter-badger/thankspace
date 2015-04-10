<?php

/**
 * Include helpers
 */
include_once(app_path('helpers.php'));


Route::get('/', [ 'as' => 'page.index', 'uses' => 'PageController@index' ]);


/* Page that Require Authentication */
Route::group(['before' => 'auth'], function() {

	Route::get('/dashboard', [ 'as' => 'user.dashboard', 'uses' => 'UserController@dashboard' ]);
	Route::get('/member-list', [ 'as' => 'user.member_list', 'uses' => 'UserController@memberList' ]);
	Route::get('/add-member', [ 'as' => 'user.member_add', 'uses' => 'UserController@memberAdd' ]);
	// Route::get('/storage', [ 'as' => 'user.storage', 'uses' => 'UserController@storage' ]);
	Route::get('/invoice', [ 'as' => 'user.invoice', 'uses' => 'UserController@invoice' ]);
	Route::get('/setting', [ 'as' => 'user.setting', 'uses' => 'UserController@setting' ]);
	Route::put('/update-profile', [ 'as' => 'user.update_profile', 'uses' => 'UserController@updateProfile' ]);
	Route::put('/update-password', [ 'as' => 'user.update_password', 'uses' => 'UserController@updatePassword' ]);
	Route::post('/check-password', [ 'as' => 'user.check_password', 'uses' => 'UserController@checkPassword' ]);
	Route::post('/confirm-payment', [ 'as' => 'user.confirm_payment', 'uses' => 'UserController@confirmPayment' ]);

});

/* Order Pages */
Route::get('/order', [ 'as' => 'order.index', 'uses' => 'OrderController@index' ]);
Route::get('/order/schedule', [ 'as' => 'order.schedule', 'uses' => 'OrderController@schedule' ]);
Route::get('/order/payment', [ 'as' => 'order.payment', 'uses' => 'OrderController@payment' ]);
Route::get('/order/review', [ 'as' => 'order.review', 'uses' => 'OrderController@review' ]);
Route::get('/order/completed', [ 'as' => 'order.completed', 'uses' => 'OrderController@completed' ]);
Route::post('/order/progress', [ 'as' => 'order.progress', 'uses' => 'OrderController@progress' ]);
Route::get('/order/reset', [ 'as' => 'order.reset', 'uses' => 'OrderController@reset' ]);
/* End Order Pages */


/* Static Pages */
Route::get('/page/faq', [ 'as' => 'page.faq', 'uses' => 'PageController@faq' ]);
Route::get('/page/about-us', [ 'as' => 'page.about_us', 'uses' => 'HomeController@index' ]);
Route::get('/page/careers', [ 'as' => 'page.careers', 'uses' => 'HomeController@index' ]);
Route::get('/page/terms-and-conditions', [ 'as' => 'page.tos', 'uses' => 'PageController@tos' ]);
Route::get('/page/storage-rules', [ 'as' => 'page.storage_rules', 'uses' => 'HomeController@index' ]);
Route::get('/page/contact-us', [ 'as' => 'page.contact_us', 'uses' => 'HomeController@index' ]);
/* End Static Pages */

/* User */
Route::get('/signout', [ 'as' => 'user.signout', 'uses' => 'UserController@signout' ]);

Route::post('/signin', [ 'as' => 'user.signin', 'uses' => 'UserController@signin' ]);
Route::post('/signup', [ 'as' => 'user.signup', 'uses' => 'UserController@signup' ]);
Route::post('/forgot-password', [ 'as' => 'user.forgot_password', 'uses' => 'UserController@index' ]);
/* End user */
