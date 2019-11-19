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
})->name('welcome');


Route::post('/signup','UserController@postSignUp')->name('signup');

Route::post('/signin', 'UserController@postSignIn')->name('signin');

Route::get('/logout', 'userController@getLogout')->name('logout');

Route::get('/dashboard', 'PostController@getDashboard')->middleware('auth')->name('dashboard');

Route::post('/createpost', 'PostController@postCreatePost')->middleware('auth')->name('post.create');

Route::get('/delete/{post_id}', 'PostController@getDeletePost')->middleware('auth')->name('post.delete');