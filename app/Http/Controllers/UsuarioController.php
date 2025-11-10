<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use App\Models\Usuario;
use App\Helpers\JWT;
use Illuminate\Http\Request;
use Illuminate\Support\Str;

class UsuarioController extends Controller
{
    public function index()
    {
        return response()->json([
            'status' => true,
            'data' => Usuario::all()
        ]);
    }

    /**
     * Registrar un abogado
     */
  public function storeAbogado(Request $request)
{
    try {
        $rol = $request->input('rol', 'abogado'); // Por defecto abogado

        // 1. VALIDACIÓN
        $rules = [
            'nombre'   => 'required|string|max:255',
            'correo'   => 'required|email|unique:usuarios,correo',
            'password' => 'required|string|min:6',
        ];

        // Solo si es abogado, validamos campos extras
        if ($rol === 'abogado') {
            $rules['telefono']     = 'nullable|string|max:20';
            $rules['especialidad'] = 'required|string|max:255';
            $rules['ubicacion']    = 'required|string|max:255';
            $rules['foto']         = 'nullable|image|mimes:jpg,jpeg,png|max:2048';
        }

        $validated = $request->validate($rules);

        // 2. GUARDAR FOTO (solo si abogado y hay foto)
        $fotoPath = null;
        if ($rol === 'abogado' && $request->hasFile('foto')) {
            $fotoPath = $request->file('foto')->store('fotos', 'public');
        }

        // 3. CREACIÓN DEL USUARIO
        $usuarioData = [
            'nombre'   => $validated['nombre'],
            'correo'   => $validated['correo'],
            'password' => bcrypt($validated['password']),
            'rol'      => $rol,
            'perfil_url' => 'https://www.teapoyamos.com/perfil/' .
                            Str::slug($validated['nombre'] . '-' . uniqid()),
        ];

        // Si es abogado agregamos campos extras
        if ($rol === 'abogado') {
            $usuarioData['telefono']     = $validated['telefono'] ?? null;
            $usuarioData['especialidad'] = $validated['especialidad'];
            $usuarioData['ubicacion']    = $validated['ubicacion'];
            $usuarioData['foto']         = $fotoPath ? asset('storage/' . $fotoPath) : null;
        }

        $usuario = Usuario::create($usuarioData);

        return response()->json([
            'status' => true,
            'message' => ucfirst($rol) . ' registrado correctamente',
            'data' => $usuario
        ], 201);

    } catch (\Exception $e) {
        return response()->json([
            'status'  => false,
            'error'   => 'Error interno al registrar el usuario',
            'details' => $e->getMessage(), // quitar en producción
        ], 500);
    }
}



      public function iniciarSesion(Request $request)
      {
          try {

              // 1. Validación
              $request->validate([
                  'correo'   => 'required|email',
                  'password' => 'required|string',
              ]);

              // 2. Buscar usuario
              $usuario = Usuario::where('correo', $request->correo)->first();

              if (!$usuario) {
                  return response()->json([
                      'status'  => false,
                      'message' => 'El correo no está registrado.'
                  ], 404);
              }

              // 3. Verificar contraseña
              if (!password_verify($request->password, $usuario->password)) {
                  return response()->json([
                      'status'  => false,
                      'message' => 'Contraseña incorrecta.'
                  ], 401);
              }

              // 4. Generar token usando tu JWT personalizado
              $token = JWT::create([
                  'id'     => $usuario->id,
                  'correo' => $usuario->correo,
              ]);

              // 5. Respuesta exitosa
              return response()->json([
                  'status'  => true,
                  'message' => 'Inicio de sesión exitoso',
                  'token'   => $token,
                  'usuario' => [
                      'id'     => $usuario->id,
                      'nombre' => $usuario->nombre,
                      'correo' => $usuario->correo,
                      'rol'    => $usuario->rol,
                  ]
              ], 200);

          } catch (\Exception $e) {

              // Error interno del servidor
              return response()->json([
                  'status'  => false,
                  'message' => 'Error interno al iniciar sesión',
                  'details' => $e->getMessage() // quitar en producción
              ], 500);
          }
      }

     
      public function eliminarUsuario(Request $request)
{
    try {
        $request->validate([
            'id' => 'required|integer|exists:usuarios,id',
        ]);

        $usuario = Usuario::findOrFail($request->id);

        // Opcional: evitar eliminar administradores principales, por ejemplo
        if ($usuario->rol === 'admin') {
            return response()->json([
                'status' => false,
                'message' => 'No se puede eliminar un administrador',
            ], 403);
        }

        $usuario->delete();

        return response()->json([
            'status' => true,
            'message' => 'Usuario eliminado correctamente',
        ], 200);

    } catch (\Exception $e) {
        return response()->json([
            'status'  => false,
            'error'   => 'Error interno al eliminar el usuario',
            'details' => $e->getMessage(), // quitar en producción
        ], 500);
    }
}

public function actualizar(Request $request)
{
    try {
        // 1. Validar que venga el ID
        $request->validate([
            'id' => 'required|integer|exists:usuarios,id',
        ]);

        $usuario = Usuario::findOrFail($request->id);
        $rol = $request->input('rol', $usuario->rol); // Tomar rol actual si no se pasa

        // 2. Validación de campos
        $rules = [
            'nombre'   => 'required|string|max:255',
            'correo'   => 'required|email|unique:usuarios,correo,' . $usuario->id,
        ];

        // Si se envía password, validar longitud y confirmación
        if ($request->filled('password')) {
            $rules['password'] = 'string|min:6|confirmed'; // requiere password_confirmation
        }

        // Solo para abogados
        if ($rol === 'abogado') {
            $rules['telefono']     = 'nullable|string|max:20';
            $rules['especialidad'] = 'required|string|max:255';
            $rules['ubicacion']    = 'required|string|max:255';
            $rules['foto']         = 'nullable|image|mimes:jpg,jpeg,png|max:2048';
        }

        $validated = $request->validate($rules);

        // 3. Actualizar campos básicos
        $usuario->nombre = $validated['nombre'];
        $usuario->correo = $validated['correo'];

        if (isset($validated['password'])) {
            $usuario->password = bcrypt($validated['password']);
        }

        // 4. Actualizar campos de abogado
        if ($rol === 'abogado') {
            $usuario->telefono     = $validated['telefono'] ?? $usuario->telefono;
            $usuario->especialidad = $validated['especialidad'];
            $usuario->ubicacion    = $validated['ubicacion'];

            if ($request->hasFile('foto')) {
                $fotoPath = $request->file('foto')->store('fotos', 'public');
                $usuario->foto = asset('storage/' . $fotoPath);
            }
        }

        // 5. Guardar cambios
        $usuario->save();

        return response()->json([
            'status'  => true,
            'message' => ucfirst($rol) . ' actualizado correctamente',
            'data'    => $usuario,
        ], 200);

    } catch (\Exception $e) {
        return response()->json([
            'status'  => false,
            'error'   => 'Error interno al actualizar el usuario',
            'details' => $e->getMessage(), // quitar en producción
        ], 500);
    }
}

}
