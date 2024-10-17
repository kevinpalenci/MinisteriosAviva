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


    public function handleBlog(Request $request, $id = null)
    {
        // Método GET: Obtener un blog específico o todos los blogs
        if ($request->isMethod('get')) {
            if ($id) {
                // Retornar un blog específico
                return response()->json(Blog::findOrFail($id));
            } else {
                // Retornar todos los blogs
                return response()->json(Blog::all());
            }
        }
    
        // Método POST: Crear un nuevo blog
        if ($request->isMethod('post')) {
            // Validación del blog para la creación
            $request->validate([
                'title' => 'required|max:255',
                'description' => 'required',
                'image_url' => 'required|url',
            ]);
    
            // Creación del blog
            $blog = Blog::create([
                'title' => $request->title,
                'description' => $request->description,
                'image_url' => $request->image_url,
                'author_id' => auth()->id(),  // Si tienes un sistema de autenticación
            ]);
    
            return response()->json([
                'message' => 'Blog creado exitosamente.',
                'blog' => $blog
            ]);
        }
    
        // Método PUT: Actualizar un blog existente
        if ($request->isMethod('put')) {
            // Validar si el blog existe
            $blog = Blog::find($id);
            if (!$blog) {
                return response()->json(['message' => 'Blog no encontrado.'], 404);
            }
    
            // Validar los datos
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
            ], 200);
        }
    
        // Método DELETE: Eliminar un blog existente
        if ($request->isMethod('delete')) {
            // Validar si el blog existe
            $blog = Blog::find($id);
            if (!$blog) {
                return response()->json(['message' => 'Blog no encontrado.'], 404);
            }
    
            // Eliminar el blog
            $blog->delete();
    
            return response()->json(['message' => 'Blog eliminado exitosamente.'], 200);
        }
    
        // Si llega un método no permitido
        return response()->json(['message' => 'Método no permitido.'], 405);
    }
    


}
