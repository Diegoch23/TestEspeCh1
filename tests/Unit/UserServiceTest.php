<?php
namespace Tests\Unit;

use Tests\TestCase;
use App\Models\Post;
use Illuminate\Support\Facades\Storage;

class UserServiceTest extends TestCase
{
    public function testPostCanBeUpdated()
    {
        // ID del post que deseas actualizar
        $postId = 4; // Cambia esto al ID del post que deseas actualizar

        // Obtener el post específico por ID
        $post = Post::find($postId);

        // Si no existe un post con el ID especificado, la prueba fallará
        if (!$post) {
            $this->fail("No se encontró un post con el ID {$postId} en la base de datos para actualizar.");
        }

        // Asegurarse de que la imagen existe en el almacenamiento público
        $imagePath = 'images/BBWrILVadZWtVS5ofdhJXmkKnZNXvqXFQLh8Es63.gif';
        $storagePath = public_path('storage/' . $imagePath);

        // Verifica si la imagen existe en el sistema de archivos
        if (!file_exists($storagePath)) {
            $this->fail("No se encontró la imagen en la ruta especificada: {$storagePath}");
        }

        // Datos para la actualización del post
        $updatedData = [
            'title' => 'Título Actualizado 3',
            'body' => 'Este es el cuerpo actualizado del post.',
            'image_url' => $imagePath, // Usar la URL de la imagen existente
            'active' => true,
        ];

        // Actualizar el post usando el modelo
        $post->update($updatedData);

        // Verificar que el post haya sido actualizado en la base de datos
        $this->assertDatabaseHas('posts', [
            'id' => $post->id,
            'title' => 'Título Actualizado 3',
            'body' => 'Este es el cuerpo actualizado del post.',
            'image_url' => $updatedData['image_url'],
            'active' => true,
        ]);

        // Verificar que la imagen exista en el sistema de archivos
        $this->assertFileExists($storagePath);
    }
}
