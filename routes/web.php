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
Route::resource('post', 'PostController');
Route::get('/post/{post}/password', 'PostController@password')->name('post.password');
Route::post('/post/{post}/password', 'PostController@passwordlogin')->name('post.password-login');
Route::post('post/{post}/reply', 'ReplyController@store')->name('reply.store');
