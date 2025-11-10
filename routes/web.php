<?php

use Illuminate\Support\Facades\Route;

Route::view('/', 'components.index')->name('index');
Route::view('/nosotros', 'components.nosotros')->name('nosotros');
Route::view('/servicios', 'components.servicios')->name('servicios');
Route::view('/equipo', 'components.equipo')->name('equipo');
Route::view('/trabaja', 'components.trabaja')->name('trabaja');
Route::view('/contacto', 'components.contacto')->name('contacto');


Route::view('/agregarAbogado', 'components.agregar-abogado')->name('agregar-abogado');

// Routes Admin
Route::view('/administracion/Mis_casos', 'components.modulo-admin.admin-module-mis-casos')->name('administracion.gestionar-mis-casos');
Route::view('/administracion/Nuevo_caso', 'components.modulo-admin.admin-module-new-caso')->name('administracion.new-caso');
Route::view('/administracion/Resporte', 'components.modulo-admin.admin-module-reporte')
    ->name('administracion.module-reporte');
Route::view('/administracion/Gestionar_Usuarios', 'components.modulo-admin.admin-module-gestionar-usuarios')->name('administracion.gestionar-usuarios');
