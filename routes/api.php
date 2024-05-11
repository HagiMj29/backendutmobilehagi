<?php

use App\Http\Controllers\API\ListBudayaController;
use App\Http\Controllers\API\ListSejarawanController;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\API\UserController;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| is assigned the "api" middleware group. Enjoy building your API!
|
*/

Route::get('/user',[UserController::class, 'index']);
Route::post('/users', [UserController::class, 'store']);
Route::get('/users/{user}', [UserController::class, 'show']);
Route::put('/users/{user}', [UserController::class, 'update']);
Route::delete('/users/{user}', [UserController::class, 'destroy']);

Route::post('/login', [UserController::class, 'login']);
Route::post('/logout', [UserController::class, 'logout']);

Route::post('/register', [UserController::class, 'register']);

Route::get('/budaya',[ListBudayaController::class, 'index']);
Route::get('/galeri',[ListBudayaController::class, 'galeri']);

Route::get('/sejarawan',[ListSejarawanController::class, 'index']);
Route::post('/sejarawan', [ListSejarawanController::class, 'store']);
Route::post('sejarawans/{id}/update', [ListSejarawanController::class, 'update']);
Route::delete('/sejarawan/{sejarawan}', [ListSejarawanController::class, 'destroy']);