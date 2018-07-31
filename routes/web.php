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

Route::get('/', 'HomeController@getIndex')->name('home');
Route::post('search-tour', 'HomeController@postSearchTour')->name('search-tour');
Route::post('search-tour-price', 'HomeController@postSearchTourPrice')->name('search-tour-price');
Route::get('detail/{id}', 'HomeController@getDetail')->name('tour-detail');
Route::get('province/{id}', 'HomeController@getProvince')->name('province');
Route::get('tour-place/{id}', 'HomeController@getPlace')->name('tour-place');
Route::get('comment/{id}', 'HomeController@getComment')->name('comment');
Route::get('reply/{id}', 'HomeController@getReply')->name('reply');
Route::post('register', 'HomeController@postRegister')->name('register');
