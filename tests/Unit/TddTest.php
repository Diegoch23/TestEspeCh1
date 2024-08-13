<?php
namespace Tests\Unit;

use Tests\TestCase;
use App\Models\Post;

class TddTest extends TestCase
{
    protected $post;

    // Este método se ejecuta antes de cada prueba
    protected function setUp(): void
    {
        parent::setUp();

        // ID del post que deseas actualizar
        $postId = 4; // Cambia esto al ID del post que deseas actualizar

        // Obtener el post específico por ID
        $this->post = Post::find($postId);

        // Si no existe un post con el ID especificado, la prueba fallará
        if (!$this->post) {
            $this->fail("No se encontró un post con el ID {$postId} en la base de datos para actualizar.");
        }
    }

    /** @test */
    public function un_post_puede_ser_actualizado()
    {
        // Actualizar el post obtenido
        $this->post->update([
            'title' => 'Título del Post Actualizado',
            'body' => 'Este es el cuerpo actualizado del post.',
        ]);

        // Verificar que los cambios se reflejan en la base de datos
        $this->assertDatabaseHas('posts', [
            'id' => $this->post->id, // Asegurarse de verificar el post correcto
            'title' => 'Título del Post Actualizado',
            'body' => 'Este es el cuerpo actualizado del post.',
        ]);
    }
}
