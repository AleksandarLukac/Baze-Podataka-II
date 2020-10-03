<?php

use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\Auth;

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

Route::get('/home', 'HomeController@index')->name('home');

Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');

Route::get('/about_us','AboutUsController@index')->name('about_us');

Route::get('/clubs','ClubsController@index')->name('clubs');

Route::get('/coaches','CoachesController@index')->name('coaches');

Route::get('/coaches/{coach}','CoachesController@show')->name('coaches.show');

Route::get('/clubs/{club}','ClubsController@show')->name('clubs.show');

Route::get('/clubs/{club}/users', 'UsersController@show')->name('users.show');

Route::post('/appointments', 'AppointmentsController@store')->name('appointments.store');

Route::get('/appointments/create', 'AppointmentsController@index')->name('appointments');

Route::get('/halls/{sport}', 'HallsController@show')->name('halls.show');

//Route::get('/appointments/create/{date}', 'AppointmentsController@show')->name('appointments.show');

Route::get('/appointments/create/{hall}/{date}', 'AppointmentsController@show')->name('appointments.show');

