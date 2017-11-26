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

Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');
Route::get('ajax/list/movie', 'HomeController@ajaxMovieList')->name("ajax-movie-list");
Route::get('ajax/detail/movie/{id}', 'HomeController@getMovieDetail')->name("ajax-movie-detail");
Route::get('add/movie/comment/{id}', 'HomeController@showMovieComment')->name("add-movie-comment");
Route::post('action/movie/comment', 'HomeController@addMovieCommentAction')->name("action-movie-comment-add");
Route::get('add/movie', 'HomeController@addMovie')->name("add-movie");
Route::post('action/movie/add', 'HomeController@addMovieAction')->name("action-movie-add");
