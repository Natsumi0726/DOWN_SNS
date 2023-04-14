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

// Route::get('/', function () {
//     return view('welcome');
// });
// Route::get('/home', 'HomeController@index')->name('home');

Auth::routes();


//ログアウト中のページ
Route::get('/login', 'Auth\LoginController@login');
Route::post('/login', 'Auth\LoginController@login');

Route::get('/register', 'Auth\RegisterController@register');
Route::post('/register', 'Auth\RegisterController@register');

Route::get('/added', 'Auth\RegisterController@added');


//ログイン中のページ
Route::get('/top','PostsController@index');

Route::get('/profile','UsersController@profile');
Route::post('/profile-update','UsersController@update');
// Route::get('/profile', 'UsersController@index');
// Route::post('/profile', 'UsersController@store');

Route::get('/search','UsersController@search');

Route::get('/logout', 'Auth\LoginController@logout');



//投稿とか

Route::post('posts/create', 'PostsController@create');
Route::get('post/{id}/updateForm', 'PostsController@updateForm');
Route::post('posts/update', 'PostsController@update');
Route::get('posts/{id}/delete', 'PostsController@delete');


//フォローとか

Route::get('/followList', 'FollowsController@followList');
Route::get('/followerList', 'FollowsController@followerList');
Route::post('/Follows/follow', 'FollowsController@follow');
Route::post('/unfollow', 'FollowsController@unfollow');

