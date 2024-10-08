<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\PostController;
use App\Http\Controllers\QueryBuilderController;
use App\Models\Post;

// RUTAS PUBLICAS
Route::get('/', function () {
    return view('allPosts', [
        'posts' => Post::where('active', true)->get()
    ]);
});

// RUTAS PRIVADAS
Route::view('dashboard', 'dashboard')
    ->middleware(['auth', 'verified'])
    ->name('dashboard');


Route::get('/benchmark', [PostController::class, 'benchmark'])->name('posts.benchmark');
Route::get('/posts', [PostController::class, 'index'])->name('posts.index');
Route::get('/posts/{id}', [PostController::class, 'view'])->name('posts.view');
Route::post('/posts', [PostController::class, 'store'])->name('posts.store');
Route::delete('/posts/{post}', [PostController::class, 'destroy'])->name('posts.destroy');
// Nuevas rutas para editar y actualizar posts
Route::get('/posts/{id}/edit', [PostController::class, 'edit'])->name('posts.edit');
Route::put('/posts/{id}', [PostController::class, 'update'])->name('posts.update');

Route::view('profile', 'profile')
    ->middleware(['auth'])
    ->name('profile');

// Ruta para el controlador QueryBuilderController
Route::get('query-builder/{post}', [QueryBuilderController::class, 'pruebas']);  
Route::get('query-builder/prueba-maliciosa', [QueryBuilderController::class, 'pruebaMaliciosa']);
// Ruta insegura para probar inyecciones SQL
Route::get('query-builder/inseguro/{post}', [QueryBuilderController::class, 'pruebasInseguras']);
// Ruta segura para prevenir inyecciones SQL
Route::get('query-builder/seguro/{postId}', [QueryBuilderController::class, 'pruebasSeguras']);

require __DIR__ . '/auth.php';

