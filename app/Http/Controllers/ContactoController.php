<?php

namespace App\Http\Controllers;

use App\Models\Contacto;
use Illuminate\Http\Request;
use Exception;

class ContactoController extends Controller
{
  public function store(Request $request)
{
    try {

        $validated = $request->validate([
            'nombre' => 'required|string|max:255',
            'correo' => 'required|email|max:255',
            'telefono' => 'nullable|string|max:50',
            'asunto' => 'nullable|string|max:255',
            'mensaje' => 'required|string',
        ]);

        $contacto = Contacto::create($validated);

        return response()->json([
            'status' => true,
            'message' => 'Su mensaje ha sido enviado correctamente.',
            'data' => $contacto
        ], 201);

    } catch (\Throwable $e) {
        return response()->json([
            'status' => false,
            'message' => 'Ocurrió un error al enviar el mensaje.',
            'error' => $e->getMessage(),
        ], 500);
    }
}

}

