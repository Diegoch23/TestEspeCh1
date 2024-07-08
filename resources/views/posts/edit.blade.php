<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-2xl text-gray-800 dark:text-gray-200 leading-tight">
            Editar Post
        </h2>
    </x-slot>

    <div class="py-12" style="background-image: url('https://cache.desktopnexus.com/thumbseg/2335/2335003-bigthumbnail.jpg'); background-size: cover;">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white dark:bg-gray-800 bg-opacity-90 overflow-hidden shadow-xl sm:rounded-lg">
                <div class="p-6 text-gray-900 dark:text-gray-100">
                    <form action="{{ route('posts.update', $post->id) }}" method="post" enctype="multipart/form-data">
                        @csrf
                        @method('PUT')
                        <div class="mb-4">
                            <label for="title" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Título</label>
                            <input type="text" name="title" id="title" value="{{ $post->title }}" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-600 dark:border-gray-500 dark:placeholder-gray-400 dark:text-white shadow-sm" required>
                        </div>
                        <div class="mb-4">
                            <label for="body" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Cuerpo</label>
                            <textarea id="body" name="body" rows="4" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-600 dark:border-gray-500 dark:placeholder-gray-400 dark:text-white shadow-sm" required>{{ $post->body }}</textarea>
                        </div>
                        <div class="mb-4">
                            <label for="image" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Imagen</label>
                            <input type="file" name="image" id="image" class="block w-full text-sm text-gray-900 bg-gray-50 rounded-lg border border-gray-300 cursor-pointer dark:text-gray-400 focus:outline-none dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 shadow-sm">
                        </div>
                        <div class="flex items-center p-6 space-x-4 rounded-b border-t border-gray-200 dark:border-gray-600">
                            <button type="submit" class="text-white bg-blue-700 hover:bg-blue-800 focus:ring-4 focus:outline-none focus:ring-blue-300 font-bold rounded-lg text-sm px-5 py-2.5 text-center dark:bg-blue-600 dark:hover:bg-blue-700 dark:focus:ring-blue-800 shadow-lg">Actualizar</button>
                            <a href="{{ route('posts.index') }}" class="text-gray-500 bg-white hover:bg-gray-100 focus:ring-4 focus:outline-none focus:ring-blue-300 rounded-lg border border-gray-200 text-sm font-bold px-5 py-2.5 hover:text-gray-900 focus:z-10 dark:bg-gray-700 dark:text-gray-300 dark:border-gray-500 dark:hover:text-white dark:hover:bg-gray-600 dark:focus:ring-gray-600 shadow-lg">Cancelar</a>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</x-app-layout>
