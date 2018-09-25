<?php

use App\Mail\ContactMessageCreated;

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

Auth::routes();

Route::get('/', 'FrontController@index')->name('home');

Route::get('post/{id}', 'FrontController@show')->name('post')->where(['id'=>'[0-9]+']);

Route::get('search', 'FrontController@showResearch')->name('search');

Route::get('formations', 'FrontController@showFormations')->name('formations')->where(['id'=>'[0-9]+']);

Route::get('stages', 'FrontController@showStages')->name('stages')->where(['id'=>'[0-9]+']);

//Route permettant l'accès au back-office sécurisé grâce au middleware
Route::resource('admin/post', 'PostController')->middleware('auth');


//Routes pour l'envoie d'email:

Route::get('contact', 'ContactController@create')->name('contact');

Route::post('contact', 'ContactController@store');

//Route test pour voir le rendue du mail envoyer:
Route::get('/test-mail', function(){
    return new ContactMessageCreated('john','admin@admin.fr', 'Good morning');
});