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

//The below is how we can restrict access to defenitive users. Create a group and define access.
/*Route::group(['middleware' => 'roles', 'roles'=>'Admin'], function()
{
	Route::resource('students','StudentController',['only'=>'index']);
	Route::resource('users','UserController',['only'=>'index']);
	Route::resource('attendances','AttendanceController',['only'=>'index']);
	Route::resource('grades','GradeController',['only'=>'index']);
	Route::resource('notes','NoteController',['only'=>'index']);
	Route::resource('notifications','NotificationController',['only'=>'index']);
});*/

Route::resource('users','UserController',['only'=>'edit']);
Route::resource('users','UserController',['only'=>'update']);

Route::group(['middleware' => 'roles', 'roles'=>'Admin'], function()
{
	Route::resource('users','UserController',['only'=>'index']);
});

Route::get('/validateView', 'ViewController@validateView');
Route::resource('students','StudentController');
//Route::resource('users','UserController');
Route::resource('attendances','AttendanceController');
Route::resource('grades','GradeController');
Route::resource('notes','NoteController');
Route::resource('notifications','NotificationController');

Route::get('/mentorDisplay', 'UserController@mentorDisplay');
Route::get('/employeeDisplay', 'UserController@mentorDisplay');
Route::get('/home', 'HomeController@index');
Route::get('/afterLogin', 'HomeController@afterLogin');
Route::get('/assign', array('as' => 'users.assign', 'uses' => 'UserController@postAdminAssignRoles'));
Route::post('assign', [
    'uses' => 'UserController@postAdminAssignRoles',
    'before' => 'guest'
]);



//Wildcard Route.
Route::get('/{any}', function ($any) {
	return redirect('/');
})->where('any', '.*');