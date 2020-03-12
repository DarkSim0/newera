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


Auth::routes(['verify'=>true]);

Route::get('/home', 'HomeController@index')->name('home');

Route::get('/','registrationController@dash');
Route::get('/student_register','registrationController@index');
Route::post('/student_register','registrationController@store');
Route::post('/student_contact/autocomplete','registrationController@autoComplete')->name('autocomplete.search');
Route::get('/student_register/{id}','registrationController@printform');

Route::get('/admin','AdminPageController@index');