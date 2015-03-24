<?php

/*
|--------------------------------------------------------------------------
| Application Routes
|--------------------------------------------------------------------------
|
| Here is where you can register all of the routes for an application.
| It's a breeze. Simply tell Laravel the URIs it should respond to
| and give it the Closure to execute when that URI is requested.
|
*/

Route::get('/', [ 'as' => 'page.index', 'uses' => 'HomeController@showWelcome' ]);

/* Order Pages */
Route::get('/order', [ 'as' => 'page.order', 'uses' => 'HomeController@showWelcome' ]);
Route::get('/order-schedule', [ 'as' => 'page.order_schedule', 'uses' => 'HomeController@showWelcome' ]);
Route::get('/order-payment', [ 'as' => 'page.order_payment', 'uses' => 'HomeController@showWelcome' ]);
Route::get('/order-review', [ 'as' => 'page.order_review', 'uses' => 'HomeController@showWelcome' ]);
Route::get('/order-completed', [ 'as' => 'page.order_completed', 'uses' => 'HomeController@showWelcome' ]);
/* End Order Pages */

/* Static Pages */
Route::get('/page/faq', [ 'as' => 'page.faq', 'uses' => 'HomeController@showWelcome' ]);
Route::get('/page/about-us', [ 'as' => 'page.about_us', 'uses' => 'HomeController@showWelcome' ]);
Route::get('/page/careers', [ 'as' => 'page.careers', 'uses' => 'HomeController@showWelcome' ]);
Route::get('/page/terms-and-conditions', [ 'as' => 'page.tos', 'uses' => 'HomeController@showWelcome' ]);
Route::get('/page/storage-rules', [ 'as' => 'page.storage_rules', 'uses' => 'HomeController@showWelcome' ]);
Route::get('/page/contact-us', [ 'as' => 'page.contact_us', 'uses' => 'HomeController@showWelcome' ]);
/* End Static Pages */

/* User */
Route::post('/signout', [ 'as' => 'user.signout', 'uses' => 'HomeController@showWelcome' ]);

Route::post('/signin', [ 'as' => 'user.signin', 'uses' => 'HomeController@showWelcome' ]);
Route::post('/signup', [ 'as' => 'user.signup', 'uses' => 'HomeController@showWelcome' ]);
Route::post('/forgot-password', [ 'as' => 'user.forgot_password', 'uses' => 'HomeController@showWelcome' ]);

Route::get('/dashboard', [ 'as' => 'user.dashboard', 'uses' => 'HomeController@showWelcome' ]);
Route::get('/my-storage', [ 'as' => 'user.my_storage', 'uses' => 'HomeController@showWelcome' ]);
/* End user */
