<?php

use App\Http\Controllers\AuthController;
use App\Http\Controllers\BookingController;
use App\Http\Controllers\CheckinController;
use App\Http\Controllers\DashboardController;
use App\Http\Controllers\DataController;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\TicketsController;
use Illuminate\Support\Facades\Route;

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

Route::controller(AuthController::class)->group(function(){
    Route::get('login','login')->name('login');
    Route::post('login', 'proscessLogin')->name('login');
});
Route::prefix('admin')->group(function(){
    Route::controller(HomeController::class)->group(function(){
        Route::get('home','index')->name('home');
    });
    Route::controller(DashboardController::class)->group(function(){
        Route::get('dashboard','index')->name('dashboard');
    });
    Route::controller(CheckinController::class)->group(function(){
        Route::get('checkin','index')->name('checkin.index');
    });
    Route::controller(BookingController::class)->group(function(){
        Route::prefix('booking')->group(function(){
            Route::get('/','index')->name('booking.index');
            Route::get('/{id}/edit','edit')->name('booking.edit');
            Route::put('/update/{id}','update')->name('booking.update');
            Route::delete('/destory/{id}','destroy')->name('booking.destroy');


        });
    });

    Route::resource('ticket',TicketsController::class);
});

Route::prefix('data')->group(function(){
    Route::controller(DataController::class)->group(function(){
        Route::get('ticket','tickets')->name('ticket.data');
    });
});
