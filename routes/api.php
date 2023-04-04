<?php

use Illuminate\Http\Request;
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

/* Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
    return $request->user();
}); */

Route::resource('users', App\Http\Controllers\UserController::class);

Route::post('auth/login', [App\Http\Controllers\LoginController::class, 'login']);
Route::get('auth/me', [App\Http\Controllers\LoginController::class, 'me'])->middleware(['auth:sanctum']);
Route::post('auth/logout', [App\Http\Controllers\LoginController::class, 'logout'])->middleware(['auth:sanctum']);

//Route::resource('tasks', App\Http\Controllers\TaskController::class)->middleware(['auth:sanctum']);

Route::get('users/{userID}/tasks/{all?}', [App\Http\Controllers\TaskUserController::class, 'listTask'])->middleware(['auth:sanctum']);
Route::post('users/{userID}/tasks', [App\Http\Controllers\TaskUserController::class, 'addTask'])->middleware(['auth:sanctum']);
Route::delete('users/{userID}/tasks/{taskID}', [App\Http\Controllers\TaskUserController::class, 'deleteTask'])->middleware(['auth:sanctum']);
Route::patch('users/{userID}/tasks/{taskID}/complete', [App\Http\Controllers\TaskUserController::class, 'completeTask'])->middleware(['auth:sanctum']);
Route::get('users/{userID}/tasks/next', [App\Http\Controllers\TaskUserController::class, 'nextTask'])->middleware(['auth:sanctum']);
