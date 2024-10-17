<?php

namespace App\Http\Controllers;

use App\Models\Blog;
use Illuminate\Http\Request;

class BlogController extends Controller
{
    public function welcome()
    {
        // Obtiene todos los blogs de la base de datos
        $blogs = Blog::all();

        // Pasa la variable $blogs a la vista welcome
        return view('welcome', compact('blogs'));
    }

    public function index()
{
    $blogs = Blog::all(); // Puedes agregar paginación u ordenar por fecha si lo prefieres
    return response()->json($blogs);
}

public function show($id)
{
    // Busca el blog por su ID
    $blog = Blog::find($id);

    // Verifica si el blog existe
    if (!$blog) {
        return response()->json(['message' => 'Blog not found'], 404);
    }

    // Retorna el blog encontrado
    return response()->json($blog);
}

}
