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

//middleware
Route::get('/filter', 'HomeController@filterByFollowedCategory')->name('filter');
Route::get('/all', 'HomeController@viewAll')->name('viewAll');

//login
Route::get('/login', 'LoginController@index')->name('indexLogin');
Route::post('/login', 'LoginController@logIn')->name('logIn');
Route::get('/logout', 'LoginController@logOut')->name('logOut');

//register
Route::resource('register', 'RegisterController');

//update
Route::resource('update', 'UpdateController');

//profile
Route::resource('profile', 'ProfileController');

//post
Route::get('/post/{id}', 'PostController@index')->name('postDetail');

//middleware(klo dah login)
Route::get('/mypost/{id}', 'PostController@myPostIndex')->name('myPost');
Route::get('/createpost', 'PostController@createPostIndex')->name('createPost');
Route::post('/addpost', 'PostController@addPost')->name('addPost');
Route::get('/deletepost/{id}', 'PostController@deletePost')->name('deletePost');
Route::get('/addtocart/{user}/{id}', 'PostController@addToCart')->name('addToCart');
Route::post('/comment/{id}', 'PostController@addComment')->name('addComment');

//cart
//middleware(klo dah login)
Route::get('/cart/{id}', 'CartController@index')->name('myCart');
Route::get('/deleteFromCart/{id}', 'CartController@deleteFromCart')->name('deleteFromCart');
Route::get('/checkout/{id}', 'CartController@checkout')->name('checkout');