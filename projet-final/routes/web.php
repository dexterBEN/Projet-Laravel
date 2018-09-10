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

/*Route::get('/', function () {
    return view('welcome');
});*/

Auth::routes();

Route::get('/', 'FrontController@index')->name('home');

Route::get('post/{id}', 'FrontController@show')->name('post')->where(['id'=>'[0-9]+']);

Route::get('search', 'FrontController@showResearch')->name('search');

Route::get('formations', 'FrontController@showFormations')->name('formations')->where(['id'=>'[0-9]+']);

Route::get('stages', 'FrontController@showStages')->name('stages')->where(['id'=>'[0-9]+']);

Route::get('contact', 'FrontController@showContactForm')->name('contact');

Route::resource('admin/post', 'PostController')->middleware('auth');