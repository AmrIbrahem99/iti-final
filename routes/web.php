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
    return view('auth.login');
    })->name('auth.login');

Auth::routes(['verify'=>true]);
 Route::get('/home', 'HomeController@index')->name('home')->middleware('verified');
Route::get('/posts', 'PostsController@index' )->name('posts')->middleware('auth','verified');
Route::get('/posts', 'PostsController@index')->name('posts')->middleware('verified');
Route::get('/redirect/facebook', 'Auth\LoginController@redirect');
Route::get('login/callback/facebook', 'Auth\LoginController@callback');



//------------------Posts-------------------

Route::get('/posts/create', 'PostsController@create')->name('posts.create')->middleware('auth');
Route::post('/posts/store', 'PostsController@store')->name('posts.store')->middleware('auth');

// show

Route::get('/posts/edit/{id}', 'PostsController@edit')->name('posts.edit')->middleware('auth');
Route::post('/posts/update/{id}', 'PostsController@update')->name('posts.update')->middleware('auth');
Route::get('/posts/show/{id}', 'PostsController@show')->name('post.show');

Route::get('/posts/delete/{id}', 'PostsController@delete')->name('posts.delete')->middleware('auth');

//-------------------------------------------
// Route::get('/suggest', 'SuggestController@index')->name('suggests') ;

Route::get('/follow/{id}' , 'FollowersControllers@follow')->name('user.follow');
Route::get('/unfollow/{id}' , 'FollowersControllers@unfollow')->name('user.unfollow');

// ----------------------- User ------------------




Route::get('/users/{id}' , 'UserController@profile')->name('users.profile')->where('id', '[0-9]+')->middleware('auth')->middleware('verified');;

Route::get('/users/{id}/edit' , 'UserController@edit')->name('users.edit')->middleware('auth');

Route::put('/users/{id}' , 'UserController@update')->name('users.update')->middleware('auth');

Route::put('/users/img/{id}' , 'UserController@updateImg')->name('users.updateImg')->middleware('auth');
Route::get('/users/img/{id}' , 'UserController@deleteImg')->name('users.deleteImg')->middleware('auth');


Route::get('/users/post/{id}' , 'UserController@viewpost')->name('users.viewpost');

Route::get('/logout', 'UserController@logout')->name('logout');










// -------------- save post ----------------

Route::get('posts/save/{id}' , 'SavesController@save')->name('posts.save');
Route::get('posts/save/{id}/delete' , 'SavesController@unsave')->name('posts.unsave');


Route::get('users/{id}/allSaved' , 'SavesController@allSaved') ->name('users.allSaved')->middleware('verified');


//--------------- like post ---------------

Route::get('posts/like/{id}' , 'LikesController@like')->name('posts.like');

Route::get('posts/like/{id}/delete' , 'LikesController@unlike')->name('posts.unlike');

// ----------------------- Comments ------------------

Route::post('/comment/store', 'CommentController@store')->name('comment.add');
//Route::post('/reply/store', 'CommentController@replyStore')->name('reply.add');
