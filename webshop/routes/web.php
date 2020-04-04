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

Route::get('/', function () {
    return view('welcome');
});

Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');




Route::get('/make_profile','UserController@make_profile_view')->name('make_profile_view');
Route::post('/create_profile','UserController@create_profile')->name('create_profile');
Route::get('/profile','UserController@profile_view')->name('profile_view');
Route::get('/products','ProductController@products_view')->name('products_view');
Route::get('/make_product','ProductController@make_product_view')->name('make_product_view');
Route::get('/make_offer','ProductController@make_offer_view')->name('make_offer_view');
Route::get('/offers','OfferController@offer_view')->name('offer_view');
