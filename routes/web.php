<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\SubscriptionController;
use App\Http\Controllers\BlogController;
use App\Http\Controllers\HomeController;

// Página de bienvenida para usuarios no autenticados
Route::get('/', function () {
    return view('welcome');  // Asegúrate de que esta es la vista principal de tu página pública
})->name('welcome');


Route::get('/', [HomeController::class, 'index'])->name('welcome');


// Ruta del dashboard para usuarios autenticados
Route::get('/home', [HomeController::class, 'dashboard'])->name('home')->middleware('auth');

// Rutas de autenticación (Login, Registro, etc.)
Auth::routes();

// Ruta para el dashboard (accesible solo para usuarios autenticados)
Route::get('/home', [HomeController::class, 'dashboard'])->name('home')->middleware('auth');

// Ruta para suscripción de correo
Route::post('/subscribe', [SubscriptionController::class, 'subscribe'])->name('subscribe');

// Grupo de rutas protegidas para blogs y enseñanzas (solo accesibles después de autenticarse)
Route::middleware(['auth'])->group(function () {
    // Rutas para el manejo de blogs
    Route::post('/blogs/store', [BlogController::class, 'store'])->name('blogs.store');
    Route::resource('blogs', BlogController::class);  // Rutas RESTful para blogs



    Route::delete('/blogs/{id}', [BlogController::class, 'destroy'])->name('blogs.destroy');
    Route::get('/blogs/{id}/edit', [BlogController::class, 'edit'])->name('blogs.edit');
    Route::resource('blogs', BlogController::class);

});



