<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\PanelController;
use App\Http\Controllers\TaskController;
use App\Http\Controllers\UserController;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/

Route::get('/login', [AuthController::class ,'index'])->name('login');
Route::post('/login', [AuthController::class ,'store'])->name('login.store');

Route::get('/create-user', [UserController::class ,'index'])->name('user');
Route::post('/create-user', [UserController::class ,'store'])->name('user.store');

Route::prefix('panel')->middleware(['auth'])->group(function(){
    Route::get('/', [PanelController::class, 'index'])->name('panel.index');
    Route::post('/logout', [AuthController::class ,'logout'])->name('logout');

    Route::prefix('tasks')->group(function(){
        Route::get('/', [TaskController::class, 'index'])->name('tasks.index');


    });

});
