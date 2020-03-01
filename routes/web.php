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

Auth::routes(['verify'=>true]);

Route::get('/home', 'HomeController@index')->name('home')->middleware('verified');
 
Route::get('/student_register','registrationController@index')->middleware('verified');
Route::post('/student_register','registrationController@store');
Route::get('/student_contact','registrationController@contact')->middleware('verified');
Route::post('/student_contact/autocomplete','registrationController@autoComplete')->name('autocomplete.search');