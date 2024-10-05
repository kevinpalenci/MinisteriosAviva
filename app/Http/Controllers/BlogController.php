<?php

namespace App\Http\Controllers;

use App\Models\Blog;
use Illuminate\Http\Request;

class BlogController extends Controller
{
    // Mostrar la lista de blogs (para listar en el Dashboard o en el Welcome)
    public function index()
    {
        $blogs = Blog::all();
        return view('welcome', compact('blogs')); // Modificar la vista donde quieras listar los blogs
    }

    // Mostrar el formulario para crear un nuevo blog
    public function create()
    {
        return view('dashboard.create_blog'); // Vista para crear un nuevo blog en el dashboard
    }

    // Almacenar un nuevo blog en la base de datos
    public function store(Request $request)
    {
        // Validación
        $request->validate([
            'title' => 'required|max:255',
            'description' => 'required',
            'image_url' => 'required|url',
            'author_id' => 'required' // Puedes hacer que se asigne automáticamente el ID del autor autenticado
        ]);

        // Almacenar el blog
        Blog::create($request->all());

        // Redirigir con mensaje de éxito
        return redirect()->route('blogs.index')->with('success', 'Blog creado exitosamente.');
    }

    // Mostrar un solo blog
    public function show(Blog $blog)
    {
        return view('blogs.show', compact('blog'));
    }

    public function destroy($id)
{
    $blog = Blog::findOrFail($id);
    $blog->delete();

    return response()->json(['message' => 'Blog eliminado con éxito']);
}

    // Otros métodos (edit, update, destroy) se pueden implementar según necesites
}
