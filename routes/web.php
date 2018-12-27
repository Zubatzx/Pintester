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

//login
Route::group(['middleware' => ['authGuest']], function(){
	Route::get('/login', 'LoginController@index')->name('indexLogin');
	Route::post('/login', 'LoginController@logIn')->name('logIn');
});
Route::group(['middleware' => ['authLogin']], function(){
	Route::get('/logout', 'LoginController@logOut')->name('logOut');
});

//register
Route::group(['middleware' => ['authGuest']], function(){
	Route::resource('register', 'RegisterController');
});

//home
Route::get('/home', 'HomeController@index')->name('home');
Route::group(['middleware' => ['authLogin']], function(){
	Route::get('/filter', 'HomeController@filterByFollowedCategory')->name('filter');
});

//search
Route::post('/search', 'PostController@search')->name('search');

//post
Route::get('/post/{id}', 'PostController@index')->name('postDetail');
Route::group(['middleware' => ['authLogin']], function(){
	Route::get('/mypost/{id}', 'PostController@myPostIndex')->name('myPost');
	Route::get('/createpost', 'PostController@createPostIndex')->name('createPost');
	Route::post('/addpost', 'PostController@addPost')->name('addPost');
	Route::get('/deletepost/{id}', 'PostController@deletePost')->name('deletePost');
	Route::get('/addtocart/{user}/{id}', 'PostController@addToCart')->name('addToCart');
	Route::post('/comment/{id}', 'PostController@addComment')->name('addComment');
});

//profile
Route::group(['middleware' => ['authLogin']], function(){
	Route::get('/profile/{id}','ProfileController@profile')->name('profile');
	Route::get('/profile/update/{id}','ProfileController@edit');
	Route::put('/profile/update/{id}','ProfileController@update');
	//lanjutkan chris
});

//cart
Route::group(['middleware' => ['authLogin']], function(){
	Route::get('/cart/{id}', 'CartController@index')->name('myCart');
	Route::get('/deleteFromCart/{id}', 'CartController@deleteFromCart')->name('deleteFromCart');
	Route::get('/checkout/{id}', 'CartController@checkout')->name('checkout');
});

//view
Route::get('/view/{id}', 'ViewController@index')->name('indexView');
Route::group(['middleware' => ['authAdmin']], function(){
	Route::get('/viewAll', 'ViewController@indexAll')->name('indexViewAll');
});

//manage
Route::group(['middleware' => ['authAdmin']], function(){
	Route::get('/indexUser', 'manageController@indexUser')->name('indexUser');
	Route::get('/editUser/{id}', 'manageController@indexEditUser')->name('indexEditUser');
	Route::post('/saveEditedUser/{id}', 'manageController@saveEditedUser')->name('saveEditedUser');
	Route::get('/deleteUser/{id}', 'manageController@deleteUser')->name('deleteUser');
	Route::get('/indexCategory', 'manageController@indexCategory')->name('indexCategory');
	Route::get('/addCategory', 'manageController@indexAddCategory')->name('indexAddCategory');
	Route::post('/saveNewCategory', 'manageController@saveNewCategory')->name('saveNewCategory');
	Route::get('/editCategory/{id}', 'manageController@indexEditCategory')->name('indexEditCategory');
	Route::post('/saveEditedCategory/{id}', 'manageController@saveEditedCategory')->name('saveEditedCategory');
	Route::get('/deleteCategory/{id}', 'manageController@deleteCategory')->name('deleteCategory');
});