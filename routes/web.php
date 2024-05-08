<?php

use App\Http\Controllers\ListBudayaController;
use App\Http\Controllers\ListSejarawanController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\UserController;
use App\Models\ListBudaya;

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

Route::get('/', [UserController::class, 'index'])->name('/');

Route::get('user.index', [UserController::class, 'index'])->name('user.index');
Route::get('user.create', [UserController::class, 'create'])->name('user.create');
Route::post('user/store', [UserController::class, 'store'])->name('user.store');
Route::get('user/{user}/edit', [UserController::class, 'edit'])->name('user.edit');
Route::put('user/{user}', [UserController::class, 'update'])->name('user.update');
Route::delete('user/{user}', [UserController::class, 'destroy'])->name('user.destroy');

Route::get('budaya.index', [ListBudayaController::class, 'index'])->name('budaya.index');
Route::get('budaya.create', [ListBudayaController::class, 'create'])->name('budaya.create');
Route::post('budaya.store', [ListBudayaController::class, 'store'])->name('budaya.store');


Route::get('sejarawan.index', [ListSejarawanController::class, 'index'])->name('sejarawan.index');
Route::get('sejarawan.create', [ListSejarawanController::class, 'create'])->name('sejarawan.create');
Route::post('sejarawan/store', [ListSejarawanController::class, 'store'])->name('sejarawan.store');
Route::get('sejarawan/{sejarawan}/edit', [ListSejarawanController::class, 'edit'])->name('sejarawan.edit');
Route::put('sejarawan/{sejarawan}', [ListSejarawanController::class, 'update'])->name('sejarawan.update');
Route::delete('sejarawan/{sejarawan}', [ListSejarawanController::class, 'destroy'])->name('sejarawan.destroy');