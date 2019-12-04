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


use Illuminate\Support\Facades\Route;

Route::get('/', 'FeedbackController@viewForm');
Route::post('/', 'FeedbackController@saveForm');

Route::group(['middleware' => ['feedbacks']], function () {
    Route::resource('feedbacks', 'FeedbackController')->except([
        'store'
    ]);
});

Route::get('/feedback-info/{id}', 'FeedbackInformationController@showLog')->name('info');

Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');
