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


Route::get('/', 'WelcomeController@show')->middleware('guest');
Route::get('/facebook/login', 'Auth\FacebookLoginController@redirectToProvider')->middleware('guest');
Route::get('/facebook/callback', 'Auth\FacebookLoginController@handleProviderCallback')->middleware('guest');
Route::get('/google/login', 'Auth\GoogleLoginController@redirectToProvider')->middleware('guest');
Route::get('/google/callback', 'Auth\GoogleLoginController@handleProviderCallback')->middleware('guest');
Route::post('/logout', 'Auth\LoginController@logout')->middleware('auth');
Route::get('/addquestions','QuestionsController@index');
Route::post('/addquestions','QuestionsController@store');

Route::get('/home', 'HomeController@show')->middleware('auth');
Route::get('/adminhome','HomeController@adminshow')->middleware('auth');