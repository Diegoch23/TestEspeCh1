<?php

use Illuminate\Support\Facades\Route;
USE App\Http\Controllers\PostController;
use App\Models\Post;
//RUTAS PUBLICAS
//Route::view('/', 'welcome');
Route::get('/',function(){
    return view('allPosts',[
        'posts'=>Post::where('active',true)->get()
    ]);
});

//RUTAS PRIVADAS
Route::view('dashboard', 'dashboard')
    ->middleware(['auth', 'verified'])
    ->name('dashboard');
    
Route::get('/posts',[PostController::class,'index'])->name('posts.index');
Route::get('/posts',[PostController::class,'index'])->name('posts.index');
Route::get('/posts/{id}',[PostController::class,'view'])->name('posts.view');
Route::post('/posts',[PostController::class,'store'])->name('posts.store');
Route::delete('/posts/{post}', [PostController::class, 'destroy'])->name('posts.destroy');


Route::view('profile', 'profile')
    ->middleware(['auth'])
    ->name('profile');

require __DIR__.'/auth.php';
