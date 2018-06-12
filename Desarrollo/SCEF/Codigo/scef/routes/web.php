<?php

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/


Auth::routes();

Route::group([
  'prefix' => 'api',
  'namespace' => 'Api',
], function () {
  // Route::resource('clients', 'ClientController');
  Route::resource('products', 'ProductController');
  // Route::resource('categories', 'CategoryController');
});

Route::group([
  'middleware' => ['auth', 'roles'],
  'prefix' => 'admin',
  'namespace' => 'Admin',
  'roles' => ['admin']
], function () {
  // Route::get('/', 'HomeController@index')->name('admin');
  // Route::resource('users', 'UserController');
  // Route::resource('coupons', 'CouponController');
  // Route::resource('categories', 'CategoryController');
  // Route::resource('sliders', 'SliderController');
  // Route::resource('prescriptions', 'PrescriptionController');
  // Route::resource('characteristics', 'CharacteristicController');
  // Route::resource('types', 'TypeController');
  // Route::resource('roles', 'RoleController');
  // Route::resource('popups', 'PopupController');
  // Route::resource('attributes', 'AttributeController');
});

Route::group([
  'namespace' => 'Site',
], function() {
  Route::get('/', 'HomeController@index')->name('home');
  Route::get('login', function() {
    return view('site.auth.login');
  });
  Route::get('registrar', 'AuthController@index')->name('site.register');
  // Route::get('contactanos', function () {
  //   return view('site.contactanos.index');
  // });
  Route::get('tienda', function() {
    return view('site.shop.index');
  });
  Route::resource('producto','ProductController');
  Route::resource('cart','CartController');
  Route::post('/cart/{rowId}', 'CartController@updateRowId');
  Route::post('/cartDelete/{rowId}', 'CartController@deleteRowId');
  Route::resource('checkout','CheckoutController');
});
