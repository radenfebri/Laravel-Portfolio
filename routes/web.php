<?php

use App\Http\Controllers\Backend\DashboardController;
use App\Http\Controllers\Backend\LogController;
use App\Http\Controllers\Backend\RoleController;
use Illuminate\Support\Facades\Auth;
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

Auth::routes();

Route::middleware(['has.role'])->middleware('auth')->group(function (){
    // DASHBOARD
    Route::get('dashboard', [DashboardController::class, 'index'])->name('dashboard');

    // ROLE USER
    Route::resource('role', RoleController::class);

    // LOG USER
    Route::resource('log', LogController::class);
});
