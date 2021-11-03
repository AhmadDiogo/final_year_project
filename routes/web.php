<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\RoomsController;
use App\Http\Controllers\ReservationsController;
use App\Http\Controllers\ConferenceRoomController;
use App\Http\Controllers\RestaurantController;
use App\Http\Controllers\ContactUsController;


use App\Models\Room;
use App\Models\AboutUs;


/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
*/

// Route::get('/', function () {
//     return view('welcome');
// });

Route::get('/', function () {
    $rooms = Room::all()->random(1);
    return view('index', compact('rooms'));
})->name('welcome_index');

Route::get('/about', function () {
    $about = AboutUs::first();
    return view('about', compact('about'));
})->name('about');

Route::resource('/rooms', 'RoomsController')->middleware('auth');
// Route::resource('/rooms', 'RoomsController');

Route::resource('/conference_rooms', 'ConferenceRoomController')->middleware('auth');

Route::resource('/reservations', 'ReservationsController')->middleware('auth');
Route::resource('/restaurant', 'RestaurantController')->middleware('auth');
Route::resource('/swimming_pool', 'SwimmingPoolController')->middleware('auth');
Route::resource('/contact_us', 'ContactUsController')->middleware('auth');

Route::post('/check_availability', 'RoomAvailability@availability')->name('available_rooms');

Auth::routes();

Route::group(['prefix' => 'admin'], function () {
    Voyager::routes();
});
