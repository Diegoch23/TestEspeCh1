<?php
namespace Tests\Integration;

use App\Models\Post;
use App\Models\User;
use Illuminate\Http\UploadedFile;
use Illuminate\Support\Facades\Storage;
use Tests\TestCase;

class PostIntegrationTest extends TestCase
{
    public function testCreatePost()
    {
        // Crear un usuario de prueba
        $user = User::factory()->create();

        // Simular el almacenamiento público para pruebas
        Storage::fake('public');

        // Crear una imagen real desde la carpeta 'images'
        $imagePath = 'images/BBWrILVadZWtVS5ofdhJXmkKnZNXvqXFQLh8Es63.gif';
        $storagePath = public_path('storage/' . $imagePath);

        // Verifica si la imagen existe en el sistema de archivos
        if (!file_exists($storagePath)) {
            $this->fail("No se encontró la imagen en la ruta especificada: {$storagePath}");
        }

        $uploadedFile = new UploadedFile($storagePath, 'BBWrILVadZWtVS5ofdhJXmkKnZNXvqXFQLh8Es63.gif', null, null, true);

        // Hacer la solicitud para crear un nuevo post
        $response = $this->actingAs($user)->post('/posts', [
            'title' => 'Test Post',
            'body' => 'This is a test post body',
            'active' => true,
            'image' => $uploadedFile, // Añadir la imagen al post
        ]);

        // Verificar la redirección después de crear el post
        $response->assertRedirect('/posts');

        // Verificar que el post se haya creado en la base de datos
        $this->assertDatabaseHas('posts', [
            'title' => 'Test Post',
            'body' => 'This is a test post body',
            'active' => true,
            'image_url' => $imagePath,
        ]);

        // Verificar que el archivo de imagen fue almacenado
        Storage::disk('public')->assertExists($imagePath);
    }

    public function testEditPost()
    {
        // Crear un usuario de prueba
        $user = User::factory()->create();

        // Simular el almacenamiento público para pruebas
        Storage::fake('public');

        // Crear una imagen real desde la carpeta 'images'
        $imagePath = 'images/IHNu5WBJBGNvowM9Ewgv0fI7sDVslTHW0cZKC33s.jpg';
        $storagePath = public_path('storage/' . $imagePath);

        // Verifica si la imagen existe en el sistema de archivos
        if (!file_exists($storagePath)) {
            $this->fail("No se encontró la imagen en la ruta especificada: {$storagePath}");
        }

        $uploadedFile = new UploadedFile($storagePath, 'IHNu5WBJBGNvowM9Ewgv0fI7sDVslTHW0cZKC33s.jpg', null, null, true);

        // Crear un post de prueba
        $post = Post::factory()->create([
            'title' => 'Original Title',
            'body' => 'Original body',
            'active' => true,
            'image_url' => 'images/original_image.jpg',
        ]);

        // Hacer la solicitud para editar el post
        $response = $this->actingAs($user)->put("/posts/{$post->id}", [
            'title' => 'Updated Post Title',
            'body' => 'Updated post body',
            'active' => true,
            'image' => $uploadedFile, // Añadir la imagen actualizada al post
        ]);

        // Verificar la redirección después de editar el post
        $response->assertRedirect('/posts');

        // Verificar que el post se haya actualizado en la base de datos
        $this->assertDatabaseHas('posts', [
            'id' => $post->id,
            'title' => 'Updated Post Title',
            'body' => 'Updated post body',
            'active' => true,
            'image_url' => $imagePath,
        ]);

        // Verificar que el archivo de imagen fue almacenado
        Storage::disk('public')->assertExists($imagePath);
    }
}

