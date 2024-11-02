<?php

namespace App\Http\Controllers;

use App\Models\Blog;
use Illuminate\Http\Request;

class BlogController extends Controller
{
    public function welcome()
    {
        // Usa 'distinct()' y selecciona solo las columnas necesarias para evitar duplicados
        $blogs = Blog::select('id', 'title', 'description', 'image_url', 'created_at')
                     ->distinct()
                     ->orderBy('created_at', 'desc')
                     ->get();

        // Pasamos los blogs a la vista
        return view('welcome', compact('blogs'));
    }

    public function index()
    {
        // Obtener los blogs de manera única
        $blogs = Blog::select('id', 'title', 'description', 'image_url', 'created_at')
                     ->distinct()
                     ->orderBy('created_at', 'desc')
                     ->get();

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
