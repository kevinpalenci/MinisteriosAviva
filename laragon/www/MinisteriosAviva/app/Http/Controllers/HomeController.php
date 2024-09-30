<?php

namespace App\Http\Controllers;

use App\Models\Blog;
use Illuminate\Http\Request;

class HomeController extends Controller
{
    /**
     * Muestra la página de bienvenida (pública).
     */
    public function index()
    {
        $blogs = Blog::all(); // Cargar blogs, ya que los quieres en la página principal
        return view('welcome', compact('blogs')); // Renderizar la vista welcome con los blogs
    }

    /**
     * Muestra el Dashboard para usuarios autenticados.
     */
    public function dashboard()
    {
        return view('home'); // La vista del Dashboard solo está disponible para usuarios autenticados
    }
}
