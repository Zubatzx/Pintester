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
//default
Route::get('/', function () {
    return redirect()->route('home');
});

//home
Route::get('/home', 'HomeController@index')->name('home');

//login
Route::get('/login', 'LoginController@index')->name('indexLogin');
Route::post('/login', 'LoginController@logIn')->name('logIn');
Route::get('/logout', 'LoginController@logOut')->name('logOut');

//register
Route::resource('register', 'RegisterController');

//post
Route::get('/post/{id}', 'PostController@index')->name('postDetail');