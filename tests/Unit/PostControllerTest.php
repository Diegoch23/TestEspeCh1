<?php
namespace Tests\Unit;

use Tests\TestCase;
use App\Http\Controllers\PostController;
use App\Models\Post;
use Illuminate\Http\Request;
use Illuminate\Http\UploadedFile;
use Illuminate\Support\Facades\Storage;
use Mockery;

class PostControllerTest extends TestCase
{
    public function tearDown(): void
    {
        Mockery::close();
    }

    public function testStore()
    {
        // Fijar el almacenamiento en disco 'public'
        Storage::fake('public');

        // Datos de prueba para el post
        $data = [
            'title' => 'Test Post2',
            'body' => 'This is the body of the test post2.',
            'image' => UploadedFile::fake()->image('test_image.jpg'),
        ];

        // Crear una instancia de Request con los datos de prueba
        $request = Request::create('/posts', 'POST', $data);

        // Mock del modelo Post
        $postMock = Mockery::mock(Post::class);
        $postMock->shouldReceive('save')->once();

        // Instanciar el controlador y llamar al método store
        $controller = new PostController();
        $response = $controller->store($request);

        // Verificar la redirección
        $this->assertEquals(302, $response->getStatusCode());
        $this->assertEquals(route('posts.index'), $response->headers->get('Location'));

        // Verificar que el archivo fue almacenado
        Storage::disk('public')->assertExists('images/' . $data['image']->hashName());
    }
    
}
