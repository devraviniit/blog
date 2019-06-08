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

Route::get('/', 'PostController@index')->name('home');
Route::get('/author/show/{id}','PostController@showPost')->name('post.showpost');

Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');
Route::get('/author/post', 'HomeController@getPostForm')->name('post.form');
Route::post('/author/post', 'HomeController@createPost')->name('post.form');
Route::post('/author/update', 'HomeController@updatePost')->name('post.update');
Route::post('/author/delete', 'HomeController@deletePost')->name('post.delete');
Route::get('/author/edit/{id}', 'HomeController@editPost')->name('post.edit');
