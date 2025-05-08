<?php

use App\Http\Controllers\MainController;
use App\Http\Controllers\TaskController;
use App\Http\Controllers\UserController;
use App\Http\Middleware\AuthMiddleware;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ManagerController;
use App\Http\Middleware\ManagerMiddleware;

Route::get('/', [MainController::class, 'index']); // main page
Route::get('/register', [UserController::class, 'registerPage']); // register page
Route::post('/register', [UserController::class, 'register']); // post request to register a user
Route::get('/login', [UserController::class, 'loginPage']); // login page
Route::post('/login', [UserController::class, 'login']); // post to login and auth user

Route::middleware(['auth'])->group(function () {
    Route::get('/techsupport', [TaskController::class, 'index']); // ts page
    Route::get('/createtask', [TaskController::class, 'create']); //create task page
    Route::post('/createtask', [TaskController::class, 'insertTask']); // post to create task
    Route::get('/logout', [UserController::class, 'logout']); // log out
    Route::get('/closetask/{id}', [ManagerController::class, 'closetask']); // request to close task
    Route::get('/task/{id}', [TaskController::class, 'openTask']); // show task
    Route::post('/sendmessage/{id}', [TaskController::class, 'sendMessage']);

    Route::middleware(['manager'])->group(function () {
        Route::get('/manager', [ManagerController::class, 'index'])->middleware(ManagerMiddleware::class); // manager task list
//        Route::post('/sendmessage/{id}', [ManagerController::class, 'getAnswer']); // send message to user
        Route::get('/error', [ManagerController::class, 'errorPage']); // error
        Route::get('/taketask/{id}', [ManagerController::class, 'takeTask']); // manager task taking
    });
});
