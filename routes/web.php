<?php

use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\Auth;
use App\Http\Controllers\RestauranteController;
use App\Http\Controllers\PlatoController;
use App\Http\Controllers\FotosRestauranteController;
use App\Http\Controllers\FotosplatoController;
use App\Http\Controllers\UserController;
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

//Route::get('/', [RestauranteController::class, 'index'])->name('Restaurante.index');

Auth::routes();

Route::get('/home', [\App\Http\Controllers\HomeController::class, 'index'])->name('home');

//Auth::routes();

//Route::get('/home', [\App\Http\Controllers\HomeController::class, 'index'])->name('home');

Route::resource('/restaurante', RestauranteController::class);
Route::resource('/plato', PlatoController::class);
Route::resource('/fotosrestaurante', FotosRestauranteController::class);
Route::resource('/fotosplato', FotosplatoController::class);
Route::resource('/user', UserController::class);


Route::get('/home', [\App\Http\Controllers\HomeController::class, 'index'])->name('home');
Route::get('/', [RestauranteController::class, 'main'])->name('main');
Route::get('/pageRestaurante/{id}', [RestauranteController::class, 'page_restaurante'])->name('page');
Route::resource('/comentario', App\Http\Controllers\ComentarioController::class);
