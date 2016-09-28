<?php

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| This file is where you may define all of the routes that are handled
| by your application. Just tell Laravel the URIs it should respond
| to using a Closure or controller method. Build something great!
|
*/

Route::get('/', function () {
    return view('welcome');
});

Auth::routes();

Route::resource('students','StudentController');
Route::resource('mentors','MentorController');
Route::resource('employees','EmployeeController');
Route::resource('admins','AdminController');
Route::get('/home', 'HomeController@index');
