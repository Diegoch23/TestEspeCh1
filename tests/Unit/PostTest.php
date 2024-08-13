<?php 

namespace Tests\Unit;

use Tests\TestCase;
use App\Models\Post;
use Illuminate\Support\Facades\Storage;

class PostTest extends TestCase
{
    public function testPostExistsInDatabaseWithRealImage()
    {
        // Asegurarse de que la imagen existe en el almacenamiento público
        $imagePath = 'images/BBWrILVadZWtVS5ofdhJXmkKnZNXvqXFQLh8Es63.gif';
        Storage::disk('public')->assertExists($imagePath);

        // Crea un post y guarda en la base de datos con la imagen real
        $post = Post::create([
            'title' => 'Diego Chancusig',
            'body' => 'Este es un blog de pruebas de Rendimiento y Usabilidad',
            'image_url' => $imagePath, // Usar la URL de la imagen existente
            'active' => true,
        ]);

        // Verifica que el post existe en la base de datos
        $this->assertDatabaseHas('posts', [
            'title' => 'Diego Chancusig',
            'body' => 'Este es un blog de pruebas de Rendimiento y Usabilidad',
            'image_url' => $post->image_url, // Verificar la URL de la imagen
            'active' => true,
        ]);

        // Verificar que el archivo de imagen realmente existe en el almacenamiento
        Storage::disk('public')->assertExists($post->image_url);
    }
}
