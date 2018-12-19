<?php
route::get('admin/login','Admin\AuthController@showLoginForm');
route::post('admin/login','Admin\AuthController@postLogin')->name('login');
route::get('admin/logout','Admin\AuthController@logout')->name('logout');

// 


Route::group(['prefix'=>'admin','middleware'=>'is.admin'],function(){
	route::get('dashboard',function(){
		return view('admin.layout.dashboard');
	})->name('dashboard');
	route::group(['prefix'=>'categories'],function(){
		Route::get('/', 'CategoryController@index')->name('categories.index');
		Route::get('create', 'CategoryController@create')->name('categories.create');
		Route::get('{category}', 'CategoryController@show')->name('categories.show');
		Route::post('/', 'CategoryController@store')->name('categories.store');
		Route::get('{category}/edit', 'CategoryController@edit')->name('categories.edit');
		Route::put('{category}', 'CategoryController@update')->name('categories.update');
		Route::get('delete/{id}', 'CategoryController@destroy')->name('categories.destroy');
	});
	route::group(['prefix'=>'product'],function(){
		route::get('list','ProductController@index');
		route::get('edit','ProductController@edit');
		route::get('create','ProductController@create');
	});
});
