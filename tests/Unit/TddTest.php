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

        // Aquí asumimos que ya existe un post en la base de datos y lo obtenemos.
        $this->post = Post::first(); // Obtén el primer post de la base de datos

        // Si no existe, puedes crear uno por si acaso
        if (!$this->post) {
            $this->post = Post::create([
                'title' => 'Título del Post Existente',
                'body' => 'Este es el cuerpo del post existente.',
            ]);
        }
    }

    /** @test */
    public function un_post_puede_ser_actualizado()
    {
        // Actualizar el post obtenido o creado
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
