<?php

use App\Http\Controllers\MainController;
use App\Http\Controllers\TaskController;
use App\Http\Controllers\UserController;
use Illuminate\Support\Facades\Route;

Route::get('/', [MainController::class, 'index']);
Route::get('/techsupport', [TaskController::class, 'index']);
Route::get('/createtask', [TaskController::class, 'create']);
Route::post('/createtask', [TaskController::class, 'insertTask']);
Route::get('/register', [UserController::class, 'registerPage']);
Route::post('/register', [UserController::class, 'register']);
Route::get('/login', [UserController::class, 'loginPage']);
Route::post('/login', [UserController::class, 'login']);
Route::get('/logout', [UserController::class, 'logout']);
