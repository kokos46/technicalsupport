<?php

use App\Http\Controllers\MainController;
use App\Http\Controllers\TaskController;
use Illuminate\Support\Facades\Route;

Route::get('/', [MainController::class, 'index']);
Route::get('/techsupport', [TaskController::class, 'index']);
Route::get('/createtask', [TaskController::class, 'create']);
Route::post('/createtask', [TaskController::class, 'insertTask']);
