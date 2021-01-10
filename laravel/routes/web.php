<?php
use Illuminate\Support\Facades\Route;

Route::group(['prefix' => 'panel', 'namespace' => 'admin'], function() {
    Route::get('login','LoginController@getLogin')->name('getLogin');
    Route::post('login','LoginController@postLogin')->name('postLogin');
    Route::get('logout','LoginController@getLogout')->name('getLogout');
});
Route::group(['prefix' => 'home', 'namespace' => 'FrontEnd'], function() {
    Route::get('logincus','LoginCustomerController@getLogin')->name('getLoginCus');
    Route::post('logincus','LoginCustomerController@postLogin')->name('postLoginCus');
    Route::get('logoutcus','LoginCustomerController@getLogout')->name('getLogoutCus');
});
Route::group(['middleware' => 'CheckAdminLogin','prefix' => 'panel'], function() {
    Route::get('/', function() {return view('admin.home');})->name('welcome');
});
Route::group(['middleware' => 'CheckCustomerLogin','prefix' => 'home'], function() {
    Route::get('/', function() {return view('frontend.home.index');});
});
Route::group(['middleware' => 'CheckAdminLogin','prefix' => 'panel','namespace' => 'admin'], function() {
    Route::resource('user', UserController::class);
    Route::resource('payment', PaymentController::class);
    Route::resource('banner', BannerController::class);
    Route::resource('customer', CustomerController::class);
    Route::resource('product', ProductController::class);
    Route::resource('category', CategoryController::class);
    Route::resource('brand', BrandController::class);
    Route::resource('product', ProductController::class);
    Route::get('category/productlist/{id}', 'CategoryController@productlist')->name('category.productlist');
    Route::get('/product/detail/{id}', 'ProductController@detail')->name('product.detail');
    Route::post('/ product/{product}', 'ProductController@active')->name('completedUpdate');
    Route::post('/ order/{order}', 'OrderController@active')->name('activeOrder');
    Route::get('/order_today', 'OrderController@index_today');
    Route::get('order', 'OrderController@index');
});
Route::group(['prefix' => '', 'namespace' => 'frontend'], function () {
    Route::get('/', 'HomeController@index')->name('home');
    Route::get('cart', 'HomeController@cart');
    Route::get('add-to-cart/{id}', 'HomeController@addToCart');
    Route::get('updateCart', 'HomeController@update')->name('updateCart');
    Route::get('shoplist', 'HomeController@shoplist')->name('shoplist');
    Route::get('remove-from-cart', 'HomeController@remove')->name('removeItem');
    Route::get('clear-all', 'HomeController@clear')->name('clear-all');
    Route::get('cart/checkout', 'CheckoutController@index');
    Route::get('singleproduct/{id}', 'HomeController@singleproduct')->name('singleproduct.index');
    Route::get('search', 'SearchController@search')->name('search');
    Route::get('searchByCategory', 'SearchController@search')->name('searchByCategory');
    Route::get('login', 'LoginCustomerController@getLogin')->name('login');
    Route::get('logout', 'LoginCustomerController@getLogout')->name('index.login');
    Route::get('account', 'AccountController@index');
    Route::post('cart/checkout/confirm', 'CheckoutController@confirm')->name('confirm');
    Route::post('create_account', 'AccountController@create')->name('account.create');
    Route::get('searchbycategory/{id}','SearchController@searhByCategory');

});
Route::group(['middleware' => 'CheckCustomerLogin', 'prefix' => '', 'namespace' => 'frontend'], function () {
    Route::get('cart/checkout', 'CheckoutController@index');
    Route::post('update_information' ,'AccountController@update_information')->name('update.informaton');
    Route::post('changepass','AccountController@changepass')->name('changepass');

});

/*
GET	    /product	        		index	product.index
GET	    /product/create	    		create	product.create
POST	/product					store	product.store
GET		/product/{product}			show	product.show
GET		/product/{product}/edit		edit	product.edit
PUT/PATCH	/product/{product}		update	product.update
DELETE	/ product/{product}			destroy	product.destroy
*/
