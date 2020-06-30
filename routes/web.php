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
});

Auth::routes();

Route::get('/home', 'HomeController@index');

Route::get('/professions', 'HomeController@professions');
Route::post('/addProfession', 'HomeController@addProfession');
Route::get('/deleteProfession', 'HomeController@deleteProfession');
Route::post('/editProfession', 'HomeController@editProfession');

Route::get('/professionals', 'HomeController@professionals');
Route::get('/viewProfessional/{id}', 'HomeController@viewProfessional');
Route::get('/activateProfessional', 'HomeController@activateProfessional');
Route::get('/deactivateProfessional', 'HomeController@deactivateProfessional');
Route::get('/deleteProfessional', 'HomeController@deleteProfessional');

Route::get('/users', 'HomeController@users');

Route::get('/complaints', 'HomeController@complaints');
Route::post('/respondComplaint', 'HomeController@respondComplaint');

Route::get('/payments', 'HomeController@payments');
Route::get('/receivePayment/{id}', 'HomeController@receivePayment');
Route::get('/paymentList/{id}', 'HomeController@paymentList');

Route::get('/faqs', 'HomeController@faqs');
Route::post('/faqAnswer', 'HomeController@faqAnswer');
Route::post('/deleteQuestion', 'HomeController@deleteQuestion');