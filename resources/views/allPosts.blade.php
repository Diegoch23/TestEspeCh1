<header class="bg-gray-800 py-10">
    <div class="container mx-auto text-center text-white">
        <h1 class="text-4xl font-bold">Web of Blog Espe-Latacunga</h1>
        <p class="mt-2">Universidad de las Fuerzas armadas Espe Latacunga</p>
    </div>
</header>

<nav class="bg-gray-800 p-4">
    <div class="container mx-auto flex justify-between items-center">
        <a href="/" class="text-white text-lg font-bold">Blog</a>
        <div class="text-gray-300 hover:text-white ml-4" style="background-color: rgb(3, 165, 30)" style="border: 1ch" style="border-radius: 40%" >
            @if (Route::has('login'))
            <livewire:welcome.navigation />
            @endif
        </div>
    </div>
</nav>

@include('layouts.master')
<section class="bg-white dark:bg-gray-900">
    <div class="container px-4 py-8 mx-auto">
        <h1 class="text-2xl font-semibold text-gray-800 capitalize lg:text-3xl dark:text-white">TestEspeCh</h1>
      
        <header class="grid grid-cols-2 items-center gap-2 py-10 lg:grid-cols-3">
            <div class="flex lg:justify-center lg:col-start-2">
                <img class="h-52 w-auto text-white lg:h-34 lg:text-[#FF2D20]" src="https://upload.wikimedia.org/wikipedia/commons/3/3a/Logo_ESPEOk.png" alt="Example Image">            </div>

        </header>
     
        <div class="container px-4 py-8 mx-auto">
            <div class="grid grid-cols-1 gap-4 md:grid-cols-2 lg:grid-cols-3">
                @foreach ($posts as $post)
                    <div class="bg-white shadow-md rounded-lg overflow-hidden">
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
</section>
<footer class="bg-gray-800 py-4">
    <div class="container mx-auto text-center text-white">
        <p>Creador por: Diego Chancusig y Acurio Kenneth</p>
    </div>
</footer>

