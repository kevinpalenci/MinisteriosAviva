<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\SubscriberController;
use App\Http\Controllers\ContactMessageController;
use App\Http\Controllers\BlogController;
use App\Http\Controllers\HomeController;

// Ruta base para mostrar la página de bienvenida
Route::get('/', [BlogController::class, 'welcome'])->name('welcome');

Auth::routes();

// Ruta para obtener la lista de blogs
Route::get('/blogs', [BlogController::class, 'index'])->name('blogs.index');

Route::get('/home', [HomeController::class, 'index'])->name('home');

// Ruta para suscripción
Route::post('/subscribe', [SubscriberController::class, 'store'])->name('subscribe');

// Ruta para los mensajes de contacto
Route::post('/contact', [ContactMessageController::class, 'store'])->name('contact.store');

// Ruta para gestionar blogs desde el dashboard
Route::match(['get', 'post', 'put', 'delete'], '/home/blogs/{id?}', [HomeController::class, 'handleBlog'])->name('home.blogs');

