<?php

use App\Http\Controllers\ProductoController;
use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\Auth;



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


Route::get('/productos', [ProductoController::class, 'index'])->name('productos.index');
Route::get('/productos/detalles/{id}', [ProductoController::class, 'show'])->name('productos.show');
Route::get('/productos/create', [ProductoController::class, 'create'])->name('productos.create')->middleware('auth');
Route::post('/productos', [ProductoController::class, 'store'])->name('productos.store');
Route::delete('/productos/destroy/{id}', [ProductoController::class, 'destroy'])->name('productos.destroy');

Auth::routes();

Route::get('/', [App\Http\Controllers\HomeController::class, 'logout']);
Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');
Route::get('/logout', [App\Http\Controllers\HomeController::class, 'logout']);