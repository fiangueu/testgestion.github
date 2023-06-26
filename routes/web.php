<?php

use App\Http\Controllers\DashboardController;
use App\Models;
use App\Models\Task;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

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

Route::get('/', function () {
    return view('welcome');
});
Route::get('/task/new',[App\http\Controllers\DashboardController::class,'new'])->name('task.new');
Route::get('/dashboard',[App\Http\Controllers\DashboardController::class,'index'])->name('dashboard.show');
Route::post('/task/new',[App\Http\Controllers\DashboardController::class,'save']);
Route::get('/{task}/edit',[App\Http\Controllers\DashboardController::class,'edit'])->name('task.edit');
Route::post('/{task}/edit',[App\Http\Controllers\DashboardController::class,'update']);
Route::get('/task/{id}',[App\Http\Controllers\DashboardController::class,'show'])->name('task.show');
Route::get('/{task}/delete',[App\Http\Controllers\DashboardController::class,'delete'])->name('task.delete');
Route::get('/login',[App\Http\Controllers\AuthController::class,'login'])->name('auth.login');
Route::post('/login',[App\Http\Controllers\AuthController::class,'execlogin']);
Route::delete('/logout',[App\Http\Controllers\AuthController::class,'logout'])->name('auth.logout');






