<?php

use Illuminate\Support\Facades\Route;

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

Route::view('/', 'components.index')->name('index');
Route::view('/nosotros', 'components.nosotros')->name('nosotros');
Route::view('/servicios', 'components.servicios')->name('servicios');
Route::view('/equipo', 'components.equipo')->name('equipo');
Route::view('/trabaja', 'components.trabaja')->name('trabaja');
Route::view('/contacto', 'components.contacto')->name('contacto');

