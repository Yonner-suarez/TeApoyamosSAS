<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Helpers\JWT;
use Illuminate\Support\Facades\Log;
use App\Models\Caso;

class CasoController extends Controller
{
 public function index(Request $request)
{
    try {
        // 1. Extraer usuario_id desde token
        $token = $request->bearerToken();
        $payload = JWT::decode($token);
        $usuarioId = $payload['id'] ?? null;

        if (!$usuarioId) {
            return response()->json([
                'status' => false,
                'message' => 'Usuario no autenticado'
            ], 401);
        }

        // 2. Obtener todos los casos del usuario con info del usuario
        $casos = Caso::join('usuarios', 'casos.usuario_id', '=', 'usuarios.id')
                     ->where('casos.usuario_id', $usuarioId)
                     ->orderBy('casos.fecha_inicio', 'desc')
                     ->select(
                         'casos.*', 
                         'usuarios.nombre as usuario_nombre', 
                         'usuarios.correo as usuario_correo'
                     )
                     ->get();

        return response()->json([
            'status' => true,
            'data'   => $casos
        ], 200);

    } catch (\Exception $e) {
        return response()->json([
            'status'  => false,
            'error'   => 'Error interno al obtener casos',
            'details' => $e->getMessage(),
        ], 500);
    }
}

      /**
     * Agregar un nuevo caso
     */
    public function agregarCaso(Request $request)
    {
        try {
            // 1. Validación
            $request->validate([
                'titulo'      => 'required|string|max:255',
                'descripcion' => 'nullable|string',
            ]);

            // 2. Extraer usuario_id desde token
            $token = $request->bearerToken(); // token enviado en headers
            $payload = JWT::decode($token);  // tu helper JWT debe tener decode
            $usuarioId = $payload['id'] ?? null;

            if (!$usuarioId) {
                return response()->json([
                    'status' => false,
                    'message' => 'Usuario no autenticado'
                ], 401);
            }

            // 3. Crear el caso
            $caso = Caso::create([
                'titulo'      => $request->titulo,
                'descripcion' => $request->descripcion,
                'estado'      => 'abierto',
                'usuario_id'  => $usuarioId,
                'fecha_inicio'=> now(),
            ]);

            return response()->json([
                'status'  => true,
                'message' => 'Caso agregado correctamente',
                'data'    => $caso
            ], 201);

        } catch (\Exception $e) {
            return response()->json([
                'status'  => false,
                'error'   => 'Error interno al agregar caso',
                'details' => $e->getMessage(), // quitar en producción
            ], 500);
        }
    }

     /**
     * Actualizar un caso existente
     */
    public function actualizar(Request $request)
    {
        try {
            $request->validate([
                'id'          => 'required|integer|exists:casos,id',
                'titulo'      => 'required|string|max:255',
                'descripcion' => 'nullable|string',
                'estado'      => 'required|string|in:abierto,en_progreso,cerrado',
            ]);

            $token = $request->bearerToken();
            $payload = JWT::decode($token);
            $usuarioId = $payload['id'] ?? null;

            if (!$usuarioId) {
                return response()->json([
                    'status' => false,
                    'message' => 'Usuario no autenticado'
                ], 401);
            }

            $caso = Caso::where('id', $request->id)
                        ->where('usuario_id', $usuarioId)
                        ->firstOrFail();

            $caso->update([
                'titulo'      => $request->titulo,
                'descripcion' => $request->descripcion,
                'estado'      => $request->estado,
            ]);

            return response()->json([
                'status'  => true,
                'message' => 'Caso actualizado correctamente',
                'data'    => $caso
            ], 200);

        } catch (\Exception $e) {
            return response()->json([
                'status'  => false,
                'error'   => 'Error interno al actualizar caso',
                'details' => $e->getMessage(),
            ], 500);
        }
    }
      /**
     * Eliminar un caso
     */
    public function eliminar(Request $request)
    {
        try {
            $request->validate([
                'id' => 'required|integer|exists:casos,id',
            ]);

            $token = $request->bearerToken();
            $payload = JWT::decode($token);
            $usuarioId = $payload['id'] ?? null;

            if (!$usuarioId) {
                return response()->json([
                    'status' => false,
                    'message' => 'Usuario no autenticado'
                ], 401);
            }

            $caso = Caso::where('id', $request->id)
                        ->where('usuario_id', $usuarioId)
                        ->firstOrFail();

            $caso->delete();

            return response()->json([
                'status' => true,
                'message' => 'Caso eliminado correctamente',
            ], 200);

        } catch (\Exception $e) {
            return response()->json([
                'status'  => false,
                'error'   => 'Error interno al eliminar caso',
                'details' => $e->getMessage(),
            ], 500);
        }
    }
}
