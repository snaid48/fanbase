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


// Route::get('/', function () {
//     return view('home');
// });

Route::resource('/', 'HomeController');
Route::resource('/home', 'HomeController');

Route::resource('/news', 'NewsController');

Route::post('/news/comment', 'NewsController@saveComment');

Route::resource('/event', 'EventController');

Route::post('/event/comment', 'EventController@saveComment');



Route::resource('/team', 'TeamController');

Route::resource('/historical', 'HistoricalController');

Route::post('/historical/comment', 'HistoricalController@saveComment');

Auth::routes();

// Route::get('/home', 'HomeController@index')->name('home');


Route::get('/admin/news', 'NewsController@adminIndex')->name('admin/news')->middleware('auth');
Route::get('/admin/news/add', 'NewsController@create')->name('admin/news/add')->middleware('auth');
Route::post('/news/store', 'NewsController@store');
Route::get('/news/edit/{id}','NewsController@edit');
Route::put('/news/update', 'NewsController@update');
Route::delete('/news/{id}', 'NewsController@destroy');
Route::post('/rating_news/store', 'NewsController@ratingStore');



Route::get('/admin/event', 'EventController@adminIndex')->name('admin/event')->middleware('auth');
Route::get('/admin/event/add', 'EventController@adminCreate')->name('admin/event/add')->middleware('auth');
Route::post('/event/store', 'EventController@store');
Route::get('/event/edit/{id}','EventController@edit');
Route::put('/event/update', 'EventController@update');
Route::post('/eventParticipate/check', 'EventController@participateCheck');
Route::get('/eventParcitipate/add/{id}','EventController@addParcitipate');
Route::post('/Participate/store', 'EventController@participateStore');
Route::get('/eventParticipate/{id}', 'EventController@participate_list');
Route::post('/rating_event/store', 'EventController@ratingStore');



Route::get('/admin/team', 'TeamController@adminIndex')->name('admin/team')->middleware('auth');
Route::get('/admin/province', 'TeamController@provinceIndex')->name('admin/team')->middleware('auth');
Route::get('/admin/team/add', 'TeamController@create')->name('admin/team/add')->middleware('auth');
Route::get('/admin/province/add', 'TeamController@createProvince');
Route::post('/province/store', 'TeamController@storeProvince');
Route::post('/team/store', 'TeamController@store');
Route::get('/team/edit/{id}','TeamController@edit');
Route::put('/team/update', 'TeamController@update');
Route::delete('/team/{id}', 'TeamController@destroy');

Route::get('/admin/historical', 'HistoricalController@adminIndex');
Route::get('/admin/historical/add', 'HistoricalController@create');
Route::post('/historical/store', 'HistoricalController@store');
Route::get('/historical/edit/{id}','HistoricalController@edit');
Route::put('/historical/update', 'HistoricalController@update');
Route::delete('/historical/{id}', 'HistoricalController@destroy');
Route::post('/rating_historical/store', 'HistoricalController@ratingStore');

Route::get('sendbasicemail','MailController@basic_email');
Route::get('sendhtmlemail','MailController@html_email');
Route::get('sendattachmentemail','MailController@attachment_email');



//email
Route::get('/email', function () {
    return view('email.send_email');
});
Route::post('/sendEmail', 'MailController@sendEmail');

// Route::get('printTicket/{id}','EventController@print');

Route::get('printTicket/{id}','MailController@sendEmail');

Route::get('/test', function()
{
	$beautymail = app()->make(Beautymail::class);
    $beautymail->send('emails.welcome', [], function($message)
    {
        $message
			->from('bar@example.com')
			->to('foo@example.com', 'John Smith')
			->subject('Welcome!');
    });

});