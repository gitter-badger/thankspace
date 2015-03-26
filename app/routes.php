<?php

/**
 * Include helpers
 */
include_once(app_path('helpers.php'));


Route::get('/', [ 'as' => 'page.index', 'uses' => 'PageController@index' ]);


/* Page that Require Authentication */
Route::group(['before' => ''], function() {

	Route::group(['prefix' => 'user'], function() {

		Route::get('/index', [ 'as' => 'user.index', 'uses' => 'UserController@index' ]);
		Route::get('/storage', [ 'as' => 'user.storage', 'uses' => 'UserController@storage' ]);
		Route::get('/invoice', [ 'as' => 'user.invoice', 'uses' => 'UserController@invoice' ]);
		Route::get('/setting', [ 'as' => 'user.setting', 'uses' => 'UserController@setting' ]);
		Route::get('/signout', [ 'as' => 'user.signout', 'uses' => 'UserController@signout' ]);

	});

	/* Order Pages */
	Route::get('/order', [ 'as' => 'order.index', 'uses' => 'OrderController@index' ]);
	Route::get('/order/schedule', [ 'as' => 'order.schedule', 'uses' => 'OrderController@schedule' ]);
	Route::get('/order/payment', [ 'as' => 'order.payment', 'uses' => 'OrderController@payment' ]);
	Route::get('/order/review', [ 'as' => 'order.review', 'uses' => 'OrderController@review' ]);
	Route::get('/order/completed', [ 'as' => 'order.completed', 'uses' => 'OrderController@completed' ]);
	/* End Order Pages */

});


/* Static Pages */
Route::get('/page/faq', [ 'as' => 'page.faq', 'uses' => 'HomeController@index' ]);
Route::get('/page/about-us', [ 'as' => 'page.about_us', 'uses' => 'HomeController@index' ]);
Route::get('/page/careers', [ 'as' => 'page.careers', 'uses' => 'HomeController@index' ]);
Route::get('/page/terms-and-conditions', [ 'as' => 'page.tos', 'uses' => 'HomeController@index' ]);
Route::get('/page/storage-rules', [ 'as' => 'page.storage_rules', 'uses' => 'HomeController@index' ]);
Route::get('/page/contact-us', [ 'as' => 'page.contact_us', 'uses' => 'HomeController@index' ]);
/* End Static Pages */

/* User */
Route::post('/signout', [ 'as' => 'user.signout', 'uses' => 'HomeController@index' ]);

Route::post('/signin', [ 'as' => 'user.signin', 'uses' => 'HomeController@index' ]);
Route::post('/signup', [ 'as' => 'user.signup', 'uses' => 'HomeController@index' ]);
Route::post('/forgot-password', [ 'as' => 'user.forgot_password', 'uses' => 'HomeController@index' ]);

Route::get('/dashboard', [ 'as' => 'user.dashboard', 'uses' => 'HomeController@index' ]);
Route::get('/my-storage', [ 'as' => 'user.my_storage', 'uses' => 'HomeController@index' ]);
/* End user */
