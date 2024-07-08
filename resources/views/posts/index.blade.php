<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 dark:text-gray-200 leading-tight">
            POSTS
        </h2>
    </x-slot>

    <div class="py-12" style="background-image: url('https://image.freepik.com/vetores-gratis/pecas-de-quebra-cabeca-isometrica-no-fundo-roxo_107791-2061.jpg'); background-size: cover;">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white dark:bg-gray-800 bg-opacity-90 overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 text-gray-900 dark:text-gray-100">
                    <!-- Modal toggle -->
                    <button class="block text-white bg-green-500 hover:bg-green-600 focus:ring-4 focus:outline-none focus:ring-green-300 font-bold rounded-lg text-sm px-5 py-2.5 text-center dark:bg-green-600 dark:hover:bg-green-700 dark:focus:ring-green-800" type="button" data-modal-toggle="defaultModal">
                        Nuevo post
                    </button>

                    <!-- Main Modal -->
                    <div id="defaultModal" tabindex="-1" aria-hidden="true" class="hidden overflow-y-auto overflow-x-hidden fixed top-0 right-0 left-0 z-50 w-full md:inset-0 h-modal md:h-full justify-center items-center">
                        <div class="relative p-4 w-full max-w-2xl h-full md:h-auto">
                            <!-- Modal content -->
                            <div class="relative bg-white rounded-lg shadow dark:bg-gray-700">
                                <!-- Modal header -->
                                <div class="flex justify-between items-start p-4 rounded-t border-b dark:border-gray-600">
                                    <h3 class="text-xl font-semibold text-gray-900 dark:text-white">
                                        Nuevo Post
                                    </h3>
                                    <button type="button" class="text-gray-400 bg-transparent hover:bg-gray-200 hover:text-gray-900 rounded-lg text-sm p-1.5 ml-auto inline-flex items-center dark:hover:bg-gray-600 dark:hover:text-white" data-modal-toggle="defaultModal">
                                        <svg aria-hidden="true" class="w-5 h-5" fill="currentColor" viewBox="0 0 20 20" xmlns="http://www.w3.org/2000/svg">
                                            <path fill-rule="evenodd" d="M4.293 4.293a1 1 0 011.414 0L10 8.586l4.293-4.293a1 1 0 111.414 1.414L11.414 10l4.293 4.293a1 0 01-1.414 1.414L10 11.414l-4.293 4.293a1 0 0"></path>
                                        </svg>
                                        <span class="sr-only">Close modal</span>
                                    </button>
                                </div>
                                <!-- Modal body -->
                                <div class="p-6 space-y-6">
                                    <p class="text-base leading-relaxed text-gray-500 dark:text-gray-400">
                                        Vamos a crear un nuevo post para nuestro blog. Rellena los campos y pulsa en "Crear".
                                    </p>
                                    <form action="{{ route('posts.store') }}" method="post" enctype="multipart/form-data">
                                        @csrf
                                        <div>
                                            <label for="title" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Título</label>
                                            <input type="text" name="title" id="title" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-600 dark:border-gray-500 dark:placeholder-gray-400 dark:text-white" required>
                                        </div>
                                        <div>
                                            <label for="body" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Cuerpo</label>
                                            <textarea id="body" name="body" rows="4" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-600 dark:border-gray-500 dark:placeholder-gray-400 dark:text-white" required></textarea>
                                        </div>
                                        <div>
                                            <label for="image" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Imagen</label>
                                            <input type="file" name="image" id="image" class="block w-full text-sm text-gray-900 bg-gray-50 rounded-lg border border-gray-300 cursor-pointer dark:text-gray-400 focus:outline-none dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400">
                                        </div>
                                        <!-- Modal footer -->
                                        <div class="flex items-center p-6 space-x-2 rounded-b border-t border-gray-200 dark:border-gray-600">
                                            <button type="submit" class="text-white bg-blue-700 hover:bg-blue-800 focus:ring-4 focus:outline-none focus:ring-blue-300 font-medium rounded-lg text-sm px-5 py-2.5 text-center dark:bg-blue-600 dark:hover:bg-blue-700 dark:focus:ring-blue-800">Crear</button>
                                            <button type="button" data-modal-toggle="defaultModal" class="text-gray-500 bg-white hover:bg-gray-100 focus:ring-4 focus:outline-none focus:ring-blue-300 rounded-lg border border-gray-200 text-sm font-medium px-5 py-2.5 hover:text-gray-900 focus:z-10 dark:bg-gray-700 dark:text-gray-300 dark:border-gray-500 dark:hover:text-white dark:hover:bg-gray-600 dark:focus:ring-gray-600">Cancelar</button>
                                        </div>
                                    </form>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <!-- Posts Table -->
                <div class="overflow-x-auto relative shadow-md sm:rounded-lg mt-6">
                    <table class="w-full text-sm text-left text-gray-500 dark:text-gray-400">
                        <thead class="text-xs text-gray-700 uppercase bg-gray-50 dark:bg-gray-700 dark:text-gray-400 border-b-2 border-gray-300 dark:border-gray-700">
                            <tr>
                                <th scope="col" class="py-3 px-6">ID</th>
                                <th scope="col" class="py-3 px-6">Título</th>
                                <th scope="col" class="py-3 px-6">Cuerpo</th>
                                <th scope="col" class="py-3 px-6">Imagen</th>
                                <th scope="col" class="py-3 px-6">Fecha</th>
                                <th scope="col" class="py-3 px-6">Acción</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($posts as $post)
                                <tr class="bg-white border-b dark:bg-gray-800 dark:border-gray-700 hover:bg-gray-50 dark:hover:bg-gray-700 transition duration-300">
                                    <td class="py-4 px-6">{{ $post->id }}</td>
                                    <td class="py-4 px-6">{{ $post->title }}</td>
                                    <td class="py-4 px-6">
                                        <span class="block w-64 truncate">{{ $post->body }}</span>
                                    </td>
                                    <td class="py-4 px-6">
                                        @if ($post->image_url)
                                            <img class="w-24 h-auto rounded-lg shadow-md" src="/storage/{{ $post->image_url }}" alt="image description">
                                        @else
                                            Ninguna imagen
                                        @endif
                                    </td>
                                    <td class="py-4 px-6">{{ $post->created_at->format('d-m-Y') }}</td>
                                    <td class="py-4 px-6">
                                        <a href="{{ route('posts.edit', $post->id) }}" class="text-blue-600 hover:text-blue-900 font-bold">Editar</a>
                                        <form action="{{ route('posts.destroy', $post->id) }}" method="POST" class="inline-block">
                                            @csrf
                                            @method('DELETE')
                                            <button type="submit" class="text-red-600 hover:text-red-900 font-bold ml-4">Eliminar</button>
                                        </form>
                                    </td>
                                </tr>
                            @endforeach
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
</x-app-layout>

<script>
    // JavaScript for modal toggle functionality
    document.querySelectorAll('[data-modal-toggle]').forEach(button => {
        button.addEventListener('click', () => {
            const modal = document.getElementById(button.getAttribute('data-modal-toggle'));
            modal.classList.toggle('hidden');
        });
    });
</script>
