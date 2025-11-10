<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\UsuarioController;
use App\Http\Controllers\ContactoController;
use App\Http\Controllers\SolicitudController;
use App\Http\Controllers\CasoController;

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

Route::middleware('auth:api')->get('/user', function (Request $request) {
    return $request->user();
});

Route::post('/solicitud', [SolicitudController::class, 'store']);

Route::get('/usuario', [UsuarioController::class, 'index']);
Route::post('/usuario/abogado', [UsuarioController::class, 'storeAbogado']);
Route::post('/usuario/iniciar-sesion', [UsuarioController::class, 'iniciarSesion']);
Route::post('/usuario/actualizar', [UsuarioController::class, 'actualizar']);
Route::delete('/usuario/eliminar', [UsuarioController::class, 'eliminarUsuario']);


Route::post('/contacto/solicitud', [ContactoController::class, 'store']);



Route::get('/casos', [CasoController::class, 'index']);
Route::post('/casos/agregar', [CasoController::class, 'agregarCaso']);
Route::post('/casos/actualizar', [CasoController::class, 'actualizar']); // JS envía _method=PUT
Route::delete('/casos/eliminar', [CasoController::class, 'eliminar']);
