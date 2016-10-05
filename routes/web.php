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

Route::get('/register2', function () {
    return view('register2');
});
Route::get('/validateView', 'ViewController@validateView');

Auth::routes();

Route::resource('students','StudentController');
Route::resource('mentors','MentorController');
Route::resource('employees','EmployeeController');
Route::resource('admins','AdminController');
Route::resource('attendances','AttendanceController');
Route::resource('grades','GradeController');
Route::resource('notes','NoteController');
Route::resource('notifications','NotificationController');
Route::get('/home', 'HomeController@index');
