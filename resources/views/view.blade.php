<header class="bg-gray-900 py-10">
    <div class="container mx-auto text-center text-white">
        <h1 class="text-5xl font-bold">Web of Blog Espe-Latacunga</h1>
        <p class="mt-2 text-lg">Universidad de las Fuerzas Armadas Espe Latacunga</p>
    </div>
    <div class="text-center mt-8">
        <a href="/" class="bg-blue-600 text-white px-6 py-3 rounded-lg shadow-lg hover:bg-blue-700 transition duration-300">Regresar al Inicio</a>
    </div>
</header>
@include('layouts.master')

<div class="max-w-screen-xl mx-auto mt-10">
    <main>
        <div class="mb-8 w-full max-w-screen-md mx-auto relative" style="height: 24em;">
            <div class="absolute left-0 bottom-0 w-full h-full z-10 bg-gradient-to-t from-black via-transparent to-transparent"></div>
            <img src="/storage/{{ $post->image_url }}" class="absolute left-0 top-0 w-full h-full z-0 object-cover rounded-lg shadow-lg">
            <div class="p-6 absolute bottom-0 left-0 z-20">
                <h2 class="text-4xl font-semibold text-gray-100 leading-tight bg-opacity-75 bg-black p-2 rounded">{{ $post->title }}</h2>
            </div>
        </div>
        <div class="px-4 lg:px-0 mt-12 text-gray-800 max-w-screen-md mx-auto text-lg leading-relaxed">
            <p class="pb-6">{{ $post->body }}</p>
        </div>
    </main>
</div>

<footer class="bg-gray-900 py-6 mt-10">
    <div class="container mx-auto text-center text-white">
        <p>Creado por: Diego Chancusig y Acurio Kenneth</p>
    </div>
</footer>
