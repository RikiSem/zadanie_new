<?php

use App\Http\Controllers\CarsController;
use App\Http\Controllers\EmployeesController;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "api" middleware group. Make something great!
|
*/

Route::get(
    '/getAvailableCars',
    [CarsController::class, 'getAvailableCars']
)->name('getAvailableCars');

Route::get(
    '/getUsers',
    [EmployeesController::class, 'getUsers']
)->name('getUsers');
