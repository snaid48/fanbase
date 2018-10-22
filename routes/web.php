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


Route::get('/', function () {
    return view('front_end.layouts.master');
});

Route::resource('/news', 'NewsController');

Route::post('/news/comment', 'NewsController@save_comment');

Route::resource('/event', 'EventController');

Route::post('/event/comment', 'EventController@save_comment');



Route::resource('/team', 'TeamController');

Route::resource('/historical', 'HistoricalController');

Route::post('/historical/comment', 'HistoricalController@save_comment');

Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');
