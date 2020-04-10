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
//students page
Route::get('/','registrationController@dash');
Route::get('/student_register','registrationController@index');
Route::post('/student_register','registrationController@store');
Route::post('/student_contact/autocomplete','registrationController@autoComplete')->name('autocomplete.search');
Route::get('/student_register/{id}','registrationController@printform');
Route::get('/student_register/temp_id/{id}','registrationController@GenId');
Route::get('/schedule_exam','registrationController@schedule');
Route::post('/schedule_exam','registrationController@scheduleStore');
//admin page
Route::get('/admin','AdminPageController@index');
Route::get('/admin/confirm/{id}','AdminPageController@edit');
Route::post('/admin/autocomplete','AdminPageController@autoComplete')->name('admin.search');
Route::patch('/admin/confirm/{id}','AdminPageController@update')->name('update.status');
Route::get('/admin/filter','AdminPageController@filter');
//upload
Route::post('/','UploadsController@store');


