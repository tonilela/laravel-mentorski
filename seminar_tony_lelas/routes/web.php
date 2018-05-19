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

Route::group(['middleware' => 'auth'], function() {
    Route::resource('course_users', 'CourseUsersController');
    Route::resource('users', 'UsersController');
    Route::resource('courses', 'CoursesController');
});
Auth::routes();
Route::delete('/{student_id}/ /{predmet_id}', 'CourseUsersController@destroy')->name('obrisi');
Route::put('/{student_id}/ /{predmet_id}/ /{stat}', 'CourseUsersController@update')->name('polozio');
Route::get('logout', '\App\Http\Controllers\Auth\LoginController@logout');
Route::get('/{student_id}/ /{predmet_id}', 'CourseUsersController@create')->name('dodaj_upisni');
Route::get('/home', 'HomeController@index');

