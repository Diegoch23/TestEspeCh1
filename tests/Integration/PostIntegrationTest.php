<?php

namespace Tests\Integration;

use App\Models\Post;
use App\Models\User;
use Tests\TestCase;

class PostIntegrationTest extends TestCase
{
    public function testCreatePost()
    {
        // Crear un usuario de prueba
        $user = User::factory()->create();

        // Hacer la solicitud para crear un nuevo post
        $response = $this->actingAs($user)->post('/posts', [
            'title' => 'Test Post',
            'body' => 'This is a test post body',
            'active' => true,
        ]);

        // Verificar la redirección después de crear el post
        $response->assertRedirect('/posts');

        // Verificar que el post se haya creado en la base de datos
        $this->assertDatabaseHas('posts', [
            'title' => 'Test Post',
            'body' => 'This is a test post body',
            'active' => true,
        ]);
    }

    public function testEditPost()
    {
        // Crear un usuario de prueba
        $user = User::factory()->create();

        // Crear un post de prueba
        $post = Post::factory()->create([
            'title' => 'Original Title',
            'body' => 'Original body',
            'active' => true,
        ]);

        // Hacer la solicitud para editar el post
        $response = $this->actingAs($user)->put("/posts/{$post->id}", [
            'title' => 'Updated Post Title',
            'body' => 'Updated post body',
            'active' => true,
        ]);

        // Verificar la redirección después de editar el post
        $response->assertRedirect('/posts');

        // Verificar que el post se haya actualizado en la base de datos
        $this->assertDatabaseHas('posts', [
            'id' => $post->id,
            'title' => 'Updated Post Title',
            'body' => 'Updated post body',
            'active' => true,
        ]);
    }
}
