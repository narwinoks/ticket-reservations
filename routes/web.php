<?php

use App\Http\Controllers\AuthController;
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
    Route::resource('ticket',TicketsController::class);
});

Route::prefix('data')->group(function(){
    Route::controller(DataController::class)->group(function(){
        Route::get('ticket','tickets')->name('ticket.data');
    });
});
