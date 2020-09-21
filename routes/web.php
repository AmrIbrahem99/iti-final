<?php

use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;

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
    return view('index');
    });

Auth::routes(['verify'=>true]);
// Route::get('/home', 'HomeController@index')->name('home')->middleware('verified');
Route::get('/posts', 'PostsController@index')->name('posts') ;
Route::get('/redirect/facebook', 'Auth\LoginController@redirect');
Route::get('login/callback/facebook', 'Auth\LoginController@callback');



//------------------Posts-------------------

Route::get('/posts/create', 'PostsController@create')->name('posts.create');
Route::post('/posts/store', 'PostsController@store')->name('posts.store');

// show

Route::get('/posts/edit/{id}', 'PostsController@edit')->name('posts.edit');
Route::post('/posts/update/{id}', 'PostsController@update')->name('posts.update');


Route::get('/posts/delete/{id}', 'PostsController@delete')->name('posts.delete');

//-------------------------------------------
// Route::get('/suggest', 'SuggestController@index')->name('suggests') ;

Route::get('/follow/{id}' , 'FollowersControllers@follow')->name('user.follow');

