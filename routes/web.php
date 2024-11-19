<?php

use App\Http\Controllers\MainController;
use App\Http\Controllers\TaskController;
use App\Http\Controllers\UserController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ManagerController;


Route::get('/', [MainController::class, 'index']);
Route::get('/techsupport', [TaskController::class, 'index']);
Route::get('/createtask', [TaskController::class, 'create']);
Route::post('/createtask', [TaskController::class, 'insertTask']);
Route::get('/register', [UserController::class, 'registerPage']);
Route::post('/register', [UserController::class, 'register']);
Route::get('/login', [UserController::class, 'loginPage']);
Route::post('/login', [UserController::class, 'login']);
Route::get('/logout', [UserController::class, 'logout']);
Route::get('/manager', [ManagerController::class, 'index']);
Route::get('/closetask/{id}', [ManagerController::class, 'closetask']);
Route::get('/task/{id}', [TaskController::class, 'openTask']);
Route::post('/sendmessage/{id}', [ManagerController::class, 'getAnswer']);
Route::get('/error', [ManagerController::class, 'errorPage']);
