<?php


use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ShowRoomsController;

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

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');

Route::get('/test', function() { return "Good Bye"; });

Route::get('/rooms', ShowRoomsController::class);

//We can use one by one like this

/* Route::get('/bookings', 'BookingController@index');//Index
Route::get('/bookings/create', 'BookingController@create');//Create
Route::post('/bookings', 'BookingController@store');//Store
Route::get('/bookings/{booking}', 'BookingController@show');//Show
Route::get('/bookings/{booking}/edit', 'BookingController@edit');//Edit
Route::put('/bookings/{booking}', 'BookingController@update');//Update
Route::delete('/bookings/{booking}', 'BookingController@destroy');//Delete */

// Or even better only one code row.

Route::resource('bookings', 'BookingController');