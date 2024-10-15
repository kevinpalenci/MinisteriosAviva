<?php

namespace App\Http\Controllers;

use App\Models\User;
use App\Models\Subscriber;
use App\Models\Blog;
use App\Models\ContactMessage;
use Illuminate\Http\Request;

class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index()
    {
        // Cantidad de usuarios registrados
        $cantidadUsuarios = User::count();

        // Cantidad de suscriptores
        $cantidadSuscriptores = Subscriber::count();

        // Cantidad de blogs publicados
        $cantidadBlogs = Blog::count();

        // Cantidad de mensajes de contacto
        $cantidadComentarios = ContactMessage::count();

        // Traer todos los mensajes de contacto para mostrarlos en la sección de Correos
        $mensajesContacto = ContactMessage::all();

        // Obtener todos los suscriptores
        $suscriptores = Subscriber::all();

        // Obtener todos los blogs
        $blogs = Blog::all(); // Asegúrate de tener esta variable definida

        // Pasar todas las variables a la vista
        return view('home', compact('cantidadUsuarios', 'cantidadSuscriptores', 'cantidadBlogs', 'cantidadComentarios', 'mensajesContacto', 'suscriptores', 'blogs'));
    }


    public function storeBlog(Request $request)
    {
        // Validar los datos del formulario
        $request->validate([
            'title' => 'required|max:255',
            'description' => 'required',
            'image_url' => 'required|url',
        ]);

        // Crear el blog
        $blog = Blog::create([
            'title' => $request->title,
            'description' => $request->description,
            'image_url' => $request->image_url,
            'author_id' => auth()->id(), // Suponiendo que quieres asignar el usuario autenticado como autor
        ]);

        return response()->json([
            'message' => 'Blog creado exitosamente.',
            'blog' => $blog
        ]);
    }

    public function updateBlog(Request $request, Blog $blog)
    {
        // Validar los datos del formulario
        $request->validate([
            'title' => 'required|max:255',
            'description' => 'required',
            'image_url' => 'required|url',
        ]);

        // Actualizar el blog
        $blog->update([
            'title' => $request->title,
            'description' => $request->description,
            'image_url' => $request->image_url,
        ]);

        return response()->json([
            'message' => 'Blog actualizado exitosamente.',
            'blog' => $blog
        ]);
    }

    public function destroyBlog(Blog $blog)
    {
        // Eliminar el blog
        $blog->delete();

        return response()->json([
            'message' => 'Blog eliminado exitosamente.'
        ]);
    }
}
