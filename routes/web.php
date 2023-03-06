<?php

use App\Http\Controllers\AppointmentController;
use App\Http\Controllers\DashboardController;
use App\Http\Controllers\DrugController;
use App\Http\Controllers\LoginController;
use App\Http\Controllers\mailController;
use App\Http\Controllers\RoomController;
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


Route::get("/dashboard",[DashboardController::class,"index"]);
Route::resource("/room", RoomController::class);
Route::resource("/drug",DrugController::class);
Route::resource("/mail",mailController::class);
Route::resource("/appointment",AppointmentController::class);
Route::get("/login",[LoginController::class,"login"]);
Route::post("/login",[LoginController::class,"loginCheck"]);
Route::get("/logout",[LoginController::class,"logout"]);
Route::get("/lang/{code}",[LoginController::class,"language"]);
Route::get("/locale/{code}",[DashboardController::class,"localedashboard"]);


