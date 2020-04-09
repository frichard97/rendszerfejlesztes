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
    return view('offers_view');
})->middleware('no_profile');

Auth::routes();
Route::get('/product/{id}','ProductController@product_view')->name('product_view')->middleware('no_profile')->middleware('product_view_exists_offer');


Route::middleware(['auth'])->group(function (){
    Route::get('/make_profile','UserController@make_profile_view')->name('make_profile_view')->middleware('has_profile');
    Route::post('/create_profile','UserController@create_profile')->name('create_profile')->middleware('has_profile');
    Route::middleware(['no_profile'])->group(function(){
        Route::get('/profile','UserController@profile_view')->name('profile_view');
        Route::post('/new_password','UserController@new_password')->name('new_password');
        Route::post('/new_address','UserController@new_address')->name('new_address');
        Route::get('/products','ProductController@products_view')->name('products_view');
        Route::post('/delete_product','ProductController@delete_product')->name('delete_product');
        Route::get('/make_product','ProductController@make_product_view')->name('make_product_view');
        Route::post('/create_product','ProductController@create_product')->name('create_product');
        Route::get('product/{id}/make_offer','ProductController@make_offer_view')->name('make_offer_view');
        Route::get('/offers','OfferController@offer_view')->name('offer_view');
        Route::post('product/{id}/create_offer','OfferController@create_offer')->name('create_offer');
        //ADMIN middleware TODO
        Route::middleware(['is_admin'])->group(function (){
            Route::get('/user/{id}','AdminController@user_view')->name('user_view')->middleware('user_exist');
            Route::get('/users','AdminController@users_view')->name('users_view');
            Route::get('/categories','AdminController@categories_view')->name('categories_view');
            Route::post('/delete_category','AdminController@delete_category')->name('delete_category');
            Route::post('/modify_category','AdminController@modify_category')->name('modify_category');
            Route::post('/create_category','AdminController@create_category')->name('create_category');
        });

    });

});

