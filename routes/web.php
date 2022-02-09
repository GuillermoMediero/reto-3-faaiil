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

Route::patch('/home/edit', [App\Http\Controllers\HomeController::class, 'edit'])->name('edit');

Route::get('/home/busqueda', [\App\Http\Controllers\HomeController::class, 'show'])->name('busqueda.show');

Route::post('/home/busqueda/store', [\App\Http\Controllers\HomeController::class, 'store'])->name('home.busqueda');

Route::get('/home/perfil', [\App\Http\Controllers\HomeController::class, 'perfil'])->name('home.perfil');

Route::get('/home/crearUsuario', [\App\Http\Controllers\HomeController::class, 'crearUsuario'])->name('home.crearusuario');
Route::get('/home/crearIncidencia', [\App\Http\Controllers\HomeController::class, 'crearIncidencia'])->name('home.crearincidencia');
Route::post('/home/crearUsuario/guardarUsuario', [\App\Http\Controllers\HomeController::class, 'storeusuario'])->name('home.guardarusuario');
Route::post('/home/crearUsuario/guardarIncidencia', [\App\Http\Controllers\HomeController::class, 'storeincidencia'])->name('home.guardarincidencia');
Route::get('/home/prioridad', [\App\Http\Controllers\HomeController::class, 'prioridad'])->name('prioridad');
Route::get('/home/store', [\App\Http\Controllers\HomeController::class, 'store'])->name('store');
Route::get('/autocomplete-search-zona', [App\Http\Controllers\Buscador::class, 'autocompleteSearchZona'])->name('buscarZona');
Route::get('/autocomplete-search-tipo', [App\Http\Controllers\Buscador::class, 'autocompleteSearchTipo'])->name('buscarTipo');
