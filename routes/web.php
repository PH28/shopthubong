<?php
//Admin login

Route::get('admin/login','Admin\AuthController@showLoginForm');
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
		Route::get('categories/{id}/delete', 'Admin\CategoryController@destroy')->name('categories.destroy');
		Route::get('categories/{id}/listCate', 'Admin\CategoryController@listCate')->name('categories.listCate');
	
	//Product
		Route::get('products', 'Admin\ProductController@index')->name('products.index');
		Route::get('products/create', 'Admin\ProductController@create')->name('products.create');
		Route::get('products/{product}', 'Admin\ProductController@show')->name('products.show');
		Route::post('products/product', 'Admin\ProductController@store')->name('products.store');
		Route::get('products/{product}/edit', 'Admin\ProductController@edit')->name('products.edit');
		Route::put('products/{product}', 'Admin\ProductController@update')->name('products.update');
		Route::get('products/{id}/delete', 'Admin\ProductController@destroy')->name('products.destroy');
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

		Route::get('user', 'Admin\UserController@index')->name('users.index');
		Route::get('user/create', 'Admin\UserController@create')->name('users.create');
		Route::post('user', 'Admin\UserController@store')->name('users.store');
		Route::get('user/{user}/edit', 'Admin\UserController@edit')->name('users.edit');
		Route::put('user/{user}', 'Admin\UserController@update')->name('users.update');
		Route::get('user/{user}/delete', 'Admin\UserController@destroy')->name('users.destroy');
	
});


 

  //dong.pt add
 Route::get('index',['as'=>'Trang-chu',
    'uses'=>'PageController@getIndex'
  ]);
  // 
Route::get('product-type',['as'=>'Product-type',
    'uses'=>'PageController@getProductType'
  ]);
   //
Route::get('product',['as'=>'Product',
    'uses'=>'PageController@getProduct'
  ]);
    // 
Route::get('contact',['as'=>'Contact',
    'uses'=>'PageController@getContact'
  ]);
// 
Route::get('about',['as'=>'About',
    'uses'=>'PageController@getAbout'
  ]);
