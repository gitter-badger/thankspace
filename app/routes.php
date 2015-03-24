<?php

/**
 * Include helpers
 */
include_once(app_path('helpers.php'));


Route::get('/', [ 'as' => 'page.index', 'uses' => 'PageController@index' ]);


/* Order Pages */
Route::get('/order', [ 'as' => 'page.order', 'uses' => 'HomeController@index' ]);
Route::get('/order-schedule', [ 'as' => 'page.order_schedule', 'uses' => 'HomeController@index' ]);
Route::get('/order-payment', [ 'as' => 'page.order_payment', 'uses' => 'HomeController@index' ]);
Route::get('/order-review', [ 'as' => 'page.order_review', 'uses' => 'HomeController@index' ]);
Route::get('/order-completed', [ 'as' => 'page.order_completed', 'uses' => 'HomeController@index' ]);
/* End Order Pages */

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
