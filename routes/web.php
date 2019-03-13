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
//
// Route::get('/', function () {
//     return view('welcome');
// });

Auth::routes(['verify' => true]);

Route::get('/', 'IndexController@showIndex');
// Route::get('user', 'UserController@index');
Route::resource('user', 'UserController')->except(['show', 'store', 'create'])->middleware('verified');
Route::get('/category/{category}', [
  'uses' => 'AnnonceController@category',
  'as' => 'category'
  ])->middleware('verified');
Route::get('annonce/add/{id}', 'AnnonceController@add')->middleware('verified');
Route::put('annonce/images/{id}', 'AnnonceController@images')->middleware('verified');
Route::resource('annonce', 'AnnonceController')->middleware('verified');
Route::resource('message', 'MessageController')->except(['edit', 'update'])->middleware('verified');

Route::get('/home', 'HomeController@index')->name('home')->middleware('verified');
