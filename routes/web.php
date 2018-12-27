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

//post
Route::get('/post/{id}', 'PostController@index')->name('postDetail');

//middleware(klo dah login)
Route::get('/mypost/{id}', 'PostController@myPostIndex')->name('myPost');
Route::get('/createpost', 'PostController@createPostIndex')->name('createPost');
Route::post('/addpost', 'PostController@addPost')->name('addPost');
Route::get('/deletepost/{id}', 'PostController@deletePost')->name('deletePost');
Route::get('/addtocart/{user}/{id}', 'PostController@addToCart')->name('addToCart');
Route::post('/comment/{id}', 'PostController@addComment')->name('addComment');
Route::get('/profile/{id}','ProfileController@profile')->name('profile');
Route::get('/profile/update/{id}','ProfileController@edit');
Route::put('/profile/update/{id}','ProfileController@update');

//cart
//middleware(klo dah login)
Route::get('/cart/{id}', 'CartController@index')->name('myCart');
Route::get('/deleteFromCart/{id}', 'CartController@deleteFromCart')->name('deleteFromCart');
Route::get('/checkout/{id}', 'CartController@checkout')->name('checkout');

//view
Route::get('/view/{id}', 'ViewController@index')->name('indexView');
Route::get('/viewAll', 'ViewController@indexAll')->name('indexViewAll');

//manage
//middleware(kalo admin)
Route::get('/indexUser', 'manageController@indexUser')->name('indexUser');
Route::get('/editUser/{id}', 'manageController@indexEditUser')->name('indexEditUser');

Route::get('/indexCategory', 'manageController@indexCategory')->name('indexCategory');
Route::get('/addCategory', 'manageController@indexAddCategory')->name('indexAddCategory');
Route::post('/saveNewCategory', 'manageController@saveNewCategory')->name('saveNewCategory');
Route::get('/editCategory/{id}', 'manageController@indexEditCategory')->name('indexEditCategory');
Route::post('/saveEditedCategory/{id}', 'manageController@saveEditedCategory')->name('saveEditedCategory');
Route::get('/deleteCategory/{id}', 'manageController@deleteCategory')->name('deleteCategory');