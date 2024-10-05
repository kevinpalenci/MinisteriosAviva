<?php
// SubscriptionController.php
namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Subscriber;

class SubscriptionController extends Controller
{
    public function subscribe(Request $request)
{
    // Validar que el campo de correo no esté vacío y sea un email válido
    $request->validate([
        'email' => 'required|email|unique:subscribers,email'
    ]);

    // Guardar el correo en la base de datos
    Subscriber::create([
        'email' => $request->email
    ]);

    // Redirigir con un mensaje de éxito
    return back()->with('success', '¡Gracias por suscribirte!');
}

}