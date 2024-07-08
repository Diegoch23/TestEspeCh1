<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Web of Blog Espe-Latacunga</title>
    <link href="https://cdn.jsdelivr.net/npm/tailwindcss@2.2.19/dist/tailwind.min.css" rel="stylesheet">
</head>
<body class="bg-gray-900 text-gray-100">

<!-- Header -->
<header class="bg-gradient-to-r from-green-400 via-green-600 to-blue-800 py-10">
    <div class="container mx-auto text-center">
        <h1 class="text-4xl font-bold">Web of Blog Espe-Latacunga</h1>
        <p class="mt-2">Universidad de las Fuerzas Armadas Espe Latacunga</p>
    </div>
</header>

<!-- Navigation -->
<nav class="bg-gray-900 p-4 shadow-lg">
    <div class="container mx-auto flex justify-between items-center">
        <a href="/" class="text-white text-lg font-bold"></a>
        <div class="bg-green-500 text-white py-2 px-4 rounded-lg shadow-lg transform transition duration-300 hover:shadow-xl hover:-translate-y-1">
            @if (Route::has('login'))
            <livewire:welcome.navigation />
            @endif
        </div>        
    </div>
</nav>

@include('layouts.master')

<!-- Main Section -->
<section class="relative bg-gray-900">
    <div class="absolute inset-0">
        <img src="https://images.unsplash.com/photo-1568605117036-5fe5e7bab0b7?crop=entropy&cs=tinysrgb&fit=max&fm=jpg&ixid=MnwxMzA3fDB8MHxwaG90by1wYWdlfHx8fGVufDB8fHx8&ixlib=rb-1.2.1&q=80&w=1080" alt="Background Image" class="w-full h-full object-cover opacity-50">
    </div>
    <div class="relative container px-4 py-8 mx-auto">
        <h1 class="text-2xl font-semibold text-white capitalize lg:text-3xl">TestEspeCh</h1>

        <header class="grid grid-cols-2 items-center gap-2 py-10 lg:grid-cols-3">
            <div class="flex lg:justify-center lg:col-start-2">
                <img class="h-52 w-auto text-white lg:h-34" src="https://upload.wikimedia.org/wikipedia/commons/3/3a/Logo_ESPEOk.png" alt="Example Image">
            </div>
        </header>

        <div class="container px-4 py-8 mx-auto">
            <div class="grid grid-cols-1 gap-8 md:grid-cols-2 lg:grid-cols-3">
                @foreach ($posts as $post)
                    <div class="bg-white shadow-md rounded-lg overflow-hidden transition transform hover:scale-105">
                        <img class="object-cover w-full h-48" src="storage/{{ $post->image_url }}" alt="{{ $post->title }}">
                        <div class="p-6">
                            <h2 class="text-xl font-semibold text-gray-800">{{ $post->title }}</h2>
                            <p class="text-gray-600 mt-2">{{ \Illuminate\Support\Str::limit($post->body, 100, '...') }}</p>
                            <a href="{{ route('posts.view', $post->id) }}" class="text-blue-500 hover:underline mt-4 block">Leer más...</a>
                        </div>
                    </div>
                @endforeach
            </div>
        </div>
    </div>
</section>

<!-- Footer -->
<footer class="bg-gray-800 py-4">
    <div class="container mx-auto text-center">
        <p>Creador por: Diego Chancusig y Acurio Kenneth</p>
    </div>
</footer>

</body>
</html>
