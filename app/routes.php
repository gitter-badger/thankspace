<?php

/**
 * Include helpers
 */
include_once(app_path('helpers.php'));


/**
 * Register view composer
 */
View::composer(array('partial.modal'), function($view)
{
    $view->with('list_cities', getCities());
});


Route::get('/', [ 'as' => 'page.index', 'uses' => 'PageController@index' ]);


/* Page that Require Authentication */
Route::group(['before' => 'auth'], function() {

	Route::get('/dashboard', [ 'as' => 'user.dashboard', 'uses' => 'UserController@dashboard' ]);
	Route::get('/member-list', [ 'as' => 'user.member_list', 'uses' => 'UserController@memberList' ]);
	Route::get('/add-member', [ 'as' => 'user.member_add', 'uses' => 'UserController@memberAdd' ]);
	Route::post('/add-member', [ 'as' => 'user.member_add.post', 'uses' => 'UserController@memberAddPost' ]);
	Route::get('/edit-member/{num}', [ 'as' => 'user.member_edit', 'uses' => 'UserController@memberEdit' ]);
	Route::put('/edit-member/{num}', [ 'as' => 'user.member_edit.put', 'uses' => 'UserController@memberEditPut' ]);
	Route::get('/delete-member/{num}', [ 'as' => 'user.member_delete', 'uses' => 'UserController@memberDelete' ]);
	Route::post('/set-stored', [ 'as' => 'user.delivery.stored', 'uses' => 'UserController@setDeliveryStored' ]);
	Route::post('/assign-delivery', [ 'as' => 'user.assign_delivery', 'uses' => 'UserController@assignDelivery' ]);
	Route::post('/set-returned', [ 'as' => 'user.return.set', 'uses' => 'UserController@setReturnedSet' ]);
	Route::post('/assign-return', [ 'as' => 'user.assign_return', 'uses' => 'UserController@assignReturn' ]);
	// Route::get('/storage', [ 'as' => 'user.storage', 'uses' => 'UserController@storage' ]);
	Route::get('/invoice', [ 'as' => 'user.invoice', 'uses' => 'UserController@invoice' ]);
	Route::get('/setting', [ 'as' => 'user.setting', 'uses' => 'UserController@setting' ]);
	Route::put('/update-profile', [ 'as' => 'user.update_profile', 'uses' => 'UserController@updateProfile' ]);
	Route::put('/update-password', [ 'as' => 'user.update_password', 'uses' => 'UserController@updatePassword' ]);
	Route::post('/check-password', [ 'as' => 'user.check_password', 'uses' => 'UserController@checkPassword' ]);
	Route::post('/confirm-payment', [ 'as' => 'user.confirm_payment', 'uses' => 'UserController@confirmPayment' ]);


	Route::get('/return-request', [ 'as' => 'admin.returnRequest', 'uses' => 'UserController@returnRequest' ]);
	Route::post('/return-request/{id}', [ 'as' => 'admin.postReturnRequest', 'uses' => 'UserController@postReturnRequest' ]);

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
Route::get('/page/about-us', [ 'as' => 'page.about_us', 'uses' => 'PageController@about' ]);
Route::get('/page/storage-rules', [ 'as' => 'page.storage_rules', 'uses' => 'PageController@storagerules' ]);
Route::get('/page/contact-us', [ 'as' => 'page.contact_us', 'uses' => 'PageController@contactus' ]);
Route::get('/page/careers', [ 'as' => 'page.careers', 'uses' => 'PageController@careers' ]);
Route::get('/page/terms-and-conditions', [ 'as' => 'page.tos', 'uses' => 'PageController@tos' ]);
/* End Static Pages */

/* User */
Route::get('/signout', [ 'as' => 'user.signout', 'uses' => 'UserController@signout' ]);
Route::post('/signin', [ 'as' => 'user.signin', 'uses' => 'UserController@signin' ]);
Route::post('/signup', [ 'as' => 'user.signup', 'uses' => 'UserController@signup' ]);
Route::put('/storage/{id}/update', ['as' => 'user.storageUpdate', 'uses' => 'UserController@storageUpdate']);

Route::post('/storage/{id}/return-process', ['as' => 'user.storageReturnProcess', 'uses' => 'UserController@storageReturnProcess']);

Route::post('/forgot-password', [ 'as' => 'user.forgotPassword', 'uses' => 'UserController@forgotPassword' ]);
Route::get('/forgot-password-form', [ 'as' => 'user.forgotPasswordForm', 'uses' => 'UserController@forgotPasswordForm' ]);
Route::put('/forgot-password-process', [ 'as' => 'user.forgotPasswordProcess', 'uses' => 'UserController@forgotPasswordProcess' ]);
/* End user */

Route::group(['prefix' => 'ajax', 'before' => 'ajax'], function() {
	Route::get('/invoice/{id}', ['as' => 'ajax.modalInvoiceDetail', 'uses' => 'UserController@modalInvoiceDetail']);
	Route::get('/storage/{id}', ['as' => 'ajax.modalStorageDetail', 'uses' => 'UserController@modalStorageDetail']);
	Route::get('/storage/{id}/return', ['as' => 'ajax.modalStorageReturn', 'uses' => 'UserController@modalStorageReturn']);
	Route::get('/storage/{id}/edit', ['as' => 'ajax.modalStorageEdit', 'uses' => 'UserController@modalStorageEdit']);
	Route::get('/returned-stuff/{id}', [ 'as' => 'ajax.modalReturnedStuff', 'uses' => 'UserController@modalReturnedStuff' ]);
	
	Route::get('/order-gallery/{id}', [ 'as' => 'ajax.modalOrderGallery', 'uses' => 'OrderController@modalOrderGallery' ]);
	Route::get('/order-gallery/{id}/upload', [ 'as' => 'ajax.modalOrderGalleryUpload', 'uses' => 'OrderController@modalOrderGalleryUpload' ]);

	Route::get('/return-request-confirmation/{id}', [ 'as' => 'ajax.returnRequestConfirmation', 'uses' => 'UserController@modalReturnRequestConfirmation' ]);
});

Route::post('image', [ 'as' => 'img.post', 'uses' => 'ImagesController@store' ]);
Route::get('image/{id}', [ 'as' => 'img.show', 'uses' => 'ImagesController@show' ]);
Route::get('image/{id}/remove', [ 'as' => 'img.remove', 'uses' => 'ImagesController@remove' ]);