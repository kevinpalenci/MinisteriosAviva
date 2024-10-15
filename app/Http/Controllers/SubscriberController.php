<?php

namespace App\Http\Controllers;

use App\Models\Subscriber;
use Illuminate\Http\Request;

class SubscriberController extends Controller
{
    public function store(Request $request)
    {
        // Validación del correo electrónico
        $request->validate([
            'email' => 'required|email|unique:subscribers,email',
        ]);

        // Crear el suscriptor en la base de datos
        Subscriber::create([
            'email' => $request->email,
        ]);

        // Respuesta para AJAX o redirección
        return response()->json(['message' => '¡Gracias por suscribirte!']); // Cambié 'success' a 'message'
    }
}
