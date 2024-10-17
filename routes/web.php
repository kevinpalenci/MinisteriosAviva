<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\SubscriberController;
use App\Http\Controllers\ContactMessageController;
use App\Http\Controllers\BlogController;
use App\Http\Controllers\HomeController;

// Ruta base para mostrar la página de bienvenida
Route::get('/', [BlogController::class, 'welcome'])->name('welcome');

Auth::routes();

Route::get('/home', [HomeController::class, 'index'])->name('home');

// Ruta para suscripción
Route::post('/subscribe', [SubscriberController::class, 'store'])->name('subscribe');

// Ruta para los mensajes de contacto
Route::post('/contact', [ContactMessageController::class, 'store'])->name('contact.store');

// Ruta para obtener la lista de blogs
Route::get('/blogs', [BlogController::class, 'index'])->name('blogs.index');

// Ruta para mostrar los suscriptores
Route::get('/suscriptores', [HomeController::class, 'suscriptores'])->name('suscriptores');

// Ruta para crear un blog
Route::post('/blogs', [HomeController::class, 'storeBlog'])->name('store.blog');




// Rutas para gestionar los blogs desde el dashboard
Route::match(['get', 'post', 'put', 'delete'], '/home/blogs/{id?}', [HomeController::class, 'handleBlog'])->name('home.blogs');






Route::get('/blogs/{id}', [BlogController::class, 'show']);

// Ruta para obtener la lista de blogs (GET)
Route::get('/blogs', [BlogController::class, 'index'])->name('blogs.index');

// Ruta para crear un blog (POST)
Route::post('/blogs', [HomeController::class, 'storeBlog'])->name('store.blog');

// Ruta para actualizar un blog (PUT)
Route::put('/blogs/{blog}', [HomeController::class, 'updateBlog'])->name('update.blog');

// Ruta para eliminar un blog (DELETE)
Route::delete('/blogs/{blog}', [HomeController::class, 'destroyBlog'])->name('destroy.blog');

// Ruta para obtener un blog individual (GET)
Route::get('/blogs/{blog}', [BlogController::class, 'show'])->name('blogs.show');
