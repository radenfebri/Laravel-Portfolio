<?php

use App\Http\Controllers\Backend\AssignPermissionController;
use App\Http\Controllers\Backend\AssignRoleController;
use App\Http\Controllers\Backend\DashboardController;
use App\Http\Controllers\Backend\LogController;
use App\Http\Controllers\Backend\PermissionController;
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
    Route::get('role/trash', [RoleController::class, 'trash'])->name('role.trash');
    Route::get('role/restore/{id?}', [RoleController::class, 'restore'])->name('role.restore');
    Route::get('role/delete/{id?}', [RoleController::class, 'delete'])->name('role.delete');
    Route::resource('role', RoleController::class);

    // ROLE PERMISSION
    Route::get('permission/trash', [PermissionController::class, 'trash'])->name('permission.trash');
    Route::get('permission/restore/{id?}', [PermissionController::class, 'restore'])->name('permission.restore');
    Route::get('permission/delete/{id?}', [PermissionController::class, 'delete'])->name('permission.delete');
    Route::resource('permission', PermissionController::class);

    // ASSIGN PERMISSION TO ROLE
    Route::get('assignpermission', [AssignPermissionController::class, 'index'])->name('assignpermission.index');
    Route::get('assignpermission/{role}/edit', [AssignPermissionController::class, 'edit'])->name('assignpermission.edit');
    Route::put('assignpermission/{role}/edit', [AssignPermissionController::class, 'update']);

    // ASSIGN ROLE TO USER
    Route::get('assignrole', [AssignRoleController::class, 'index'])->name('assignrole.index');
    Route::get('assignrole/{role}/edit', [AssignRoleController::class, 'edit'])->name('assignrole.edit');
    Route::put('assignrole/{role}/edit', [AssignRoleController::class, 'update']);

    // LOG USER
    Route::resource('log', LogController::class);
});
