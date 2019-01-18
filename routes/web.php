<?php
//Admin login

Route::get('admin/login','Admin\AuthController@showLoginForm')->name('admin.showlogin');
Route::post('admin/login','Admin\AuthController@postLogin')->name('admin.login');


// Password
Auth::routes();
// route::get('password/reset/{token?}','Admin\PasswordController@showResetForm')->name('admin.resetpwform');
// route::post('password/email', 'Admin\PasswordController@sendResetLinkEmail');
// route::post('password/reset','Admin\PasworrdController@reset');

//Manager
Route::group(['prefix'=>'admin','middleware'=>['auth','is.admin']],function(){
	// Route::get('dashboard',function(){
	// 	return view('admin.layout.dashboard');
	// })->name('dashboard');
	
	//Category
		Route::get('logout','Admin\AuthController@logout')->name('admin.logout');
		Route::get('dashboard','Admin\CategoryController@dash')->name('admin.dashboard');
		Route::get('/categories', 'Admin\CategoryController@index')->name('categories.index');
		Route::get('categories/create', 'Admin\CategoryController@create')->name('categories.create');
		Route::get('categories/{category}', 'Admin\CategoryController@show')->name('categories.show');
		Route::post('categories', 'Admin\CategoryController@store')->name('categories.store');
		Route::get('categories/{category}/edit', 'Admin\CategoryController@edit')->name('categories.edit');
		Route::put('categories/{category}', 'Admin\CategoryController@update')->name('categories.update');
		Route::delete('categories/{category}/delete', 'Admin\CategoryController@destroy')->name('categories.destroy');
		Route::get('categories/{id}/listCate', 'Admin\CategoryController@listCate')->name('categories.listCate');
	
	//Product
		Route::get('products', 'Admin\ProductController@index')->name('products.index');
		Route::get('products/create', 'Admin\ProductController@create')->name('products.create');
		Route::get('products/{product}', 'Admin\ProductController@show')->name('products.show');
		Route::post('products/product', 'Admin\ProductController@store')->name('products.store');
		Route::get('products/{product}/edit', 'Admin\ProductController@edit')->name('products.edit');
		Route::put('products/{product}', 'Admin\ProductController@update')->name('products.update');
		Route::delete('products/{id}/delete', 'Admin\ProductController@destroy')->name('products.destroy');
		Route::get('products/{product}/review', 'Admin\ProductController@listReview')->name('products.review');
		Route::get('products/{id}/detail', 'Admin\ProductController@detailProduct')->name('products.detail');
	//Review
		Route::get('reviews/{id}/delete', 'Admin\ReviewController@destroy')->name('reviews.destroy');
	//Order orders
		Route::get('orders', 'Admin\OrderController@index')->name('orders.index');
		Route::get('orders/create', 'Admin\OrderController@create')->name('orders.create');
		Route::get('orders/{order}', 'Admin\OrderController@show')->name('orders.show');
		Route::post('orders/order', 'Admin\OrdertController@store')->name('orders.store');
		Route::get('orders/{order}/edit', 'Admin\OrderController@edit')->name('orders.edit');
		Route::put('orders/{order}', 'Admin\OrderController@update')->name('orders.update');
		Route::get('orders/{id}/delete', 'Admin\OrderController@destroy')->name('orders.destroy');
		Route::get('orders/{id}/orderdetail', 'Admin\OrderController@orderDetail')->name('orders.orderdetail');
		Route::get('orders/{id}/status/{status}', 'Admin\OrderController@updateStatus')->name('orders.status');

		Route::get('users', 'Admin\UserController@index')->name('users.index');
		Route::get('users/create', 'Admin\UserController@create')->name('users.create');
		Route::post('users', 'Admin\UserController@store')->name('users.store');
		Route::get('users/{user}/edit', 'Admin\UserController@edit')->name('users.edit');
		Route::put('users/{user}', 'Admin\UserController@update')->name('users.update');
		Route::delete('users/{user}/delete', 'Admin\UserController@destroy')->name('users.destroy');
		Route::get('users/{id}/userdetail', 'Admin\UserController@userDetail')->name('users.userdetail');
	
});

 // Route::group(['namespace'=>'Userpage'], function()
 // {
	// Route::get('index','PageController@getIndex')->name('pageusers.index');
	// Route::get('category/{id}','PageController@getCategory')->name('pageusers.category');
	// Route::get('product/{id}','PageController@getProduct')->name('pageusers.product');
	// Route::get('contact','PageController@getContact')->name('pageusers.contact');
	// Route::get('about','PageController@getAbout')->name('pageusers.about');
	// Route::get('user/viewCartdetail','PageController@getCatDetail')->name('pageusers.cartdetail');
	// Route::get('checkout/get','PageController@getCheckout')->name('pageusers.getcheckout');
	// Route::POST('checkout/post','PageController@postCheckout')->name('pageusers.postcheckout');

 //});

	Route::get('user/login', 'User\LoginController@getLogin')->name('users.showlogin');
	Route::post('user/login', 'User\LoginController@postLogin')->name('users.login');
	Route::get('user/register', 'User\LoginController@getRegister')->name('users.showregister');
	Route::post('user/register', 'User\LoginController@postRegister')->name('users.register');
	Route::get('user/verify/{token}', 'User\LoginController@getVerify')->name('users.verify');

	Route::get('logout','User\LoginController@logout')->name('users.logout');

	Route::get('/', 'IndexController@index')->name('home.index');
	Route::get('/shop', 'IndexController@showAllProduct')->name('home.shop');
	Route::get('product/{id}/','IndexController@getProduct')->name('home.product');
	Route::get('category/{id}/','IndexController@getProductOfCategory')->name('home.category');
	Route::get('product/check/{id}','ProductController@checkqtt')->name('home.checkqtt');
	Route::get('checkout/', 'IndexController@checkOut')->name('home.checkout');

	Route::get('message/', 'IndexController@message')->name('home.message');

	Route::get('search/', 'IndexController@searchProduct')->name('home.search');
	Route::get('about/', 'IndexController@getAbout')->name('home.about');



	Route::group(['prefix'=>'user','middleware'=>['is.login']],function(){
		Route::get('list-order', 'IndexController@listOrder')->name('users.listorder');
		Route::get('cart/', 'IndexController@cart')->name('users.cart');
		Route::post('order', 'IndexController@orderdetail')->name('users.orderdetail');	
		Route::get('list-order/{id}/order-detail/', 'OrderController@orderDetail')->name('users.detail');
		Route::post('product/{id}/review', 'ReviewController@store')->name('users.review');
		Route::post('{userid}/list-order/{id}/action/', 'OrderController@updateStatus')->name('users.cancel');
	});
