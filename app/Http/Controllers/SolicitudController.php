<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Solicitud;

class SolicitudController extends Controller
{
 public function store(Request $request)
{
    try {
    $validated = $request->validate([
        'nombre_completo' => 'required|string|max:255',
        'correo' => 'required|email|max:255',
        'telefono' => 'required|string|max:20',
        'experiencia' => 'nullable|string',
        'hoja_vida' => 'nullable|file|mimes:pdf|max:2048',
    ]);

    if ($request->hasFile('hoja_vida')) {
        // Guardar el PDF en storage/app/hojas_vida
        $path = $request->file('hoja_vida')->store('hojas_vida');
        $validated['hoja_vida'] = $path; // Solo guardamos la ruta
    }

    $solicitud = Solicitud::create($validated);

    return response()->json([
        'message' => 'Solicitud creada correctamente 🚀',
        'solicitud' => [
            'id' => $solicitud->id,
            'nombre_completo' => $solicitud->nombre_completo,
            'correo' => $solicitud->correo,
            'telefono' => $solicitud->telefono,
            'experiencia' => $solicitud->experiencia,
            'hoja_vida' => $solicitud->hoja_vida, // ruta al archivo
        ],
    ], 201);

} catch (\Throwable $e) {
    return response()->json([
        'error' => 'Error interno del servidor',
        'message' => $e->getMessage(),
        'linea' => $e->getLine()
    ], 500);
}

}


}
