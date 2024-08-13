<?php

namespace Tests\Unit;

use Tests\TestCase;
use App\Http\Controllers\PostController;
use App\Models\Post;
use Illuminate\Http\Request;
use Illuminate\Http\UploadedFile;
use Illuminate\Support\Facades\Storage;

class PostControllerTest extends TestCase
{
    public function testStore()
    {
        // Simular el almacenamiento en disco 'public'
        Storage::fake('public');

        // Crear una imagen simulada para el almacenamiento de pruebas
        $uploadedFile = UploadedFile::fake()->image('test_image.jpg');

        // Datos de prueba para el post, utilizando la imagen simulada
        $data = [
            'title' => 'Test Post2',
            'body' => 'This is the body of the test post2.',
            'image' => $uploadedFile,
        ];

        // Crear una instancia de Request con los datos de prueba
        $request = Request::create('/posts', 'POST', $data);

        // Instanciar el controlador y llamar al método store
        $controller = new PostController();
        $response = $controller->store($request);

        // Verificar la redirección
        $this->assertEquals(302, $response->getStatusCode());
        $this->assertEquals(route('posts.index'), $response->headers->get('Location'));

        // Verificar que el archivo fue almacenado en la ubicación correcta
        Storage::disk('public')->assertExists('images/' . $uploadedFile->hashName());

        // Verificar que el post fue guardado en la base de datos
        $this->assertDatabaseHas('posts', [
            'title' => 'Test Post2',
            'body' => 'This is the body of the test post2.',
            'image_url' => 'images/' . $uploadedFile->hashName(),
        ]);
    }
}

