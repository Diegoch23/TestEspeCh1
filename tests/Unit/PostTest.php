<?php 
namespace Tests\Unit;

use PHPUnit\Framework\TestCase;
use App\Models\Post;

class PostTest extends TestCase
{
    public function testPostModel()
    {
        $post = new Post([
            'title' => 'Test',
            'body' => 'Pruebas de Usabilidad y Rendimiento',
            'image_url' => '4bRqGIGIpaMKPsKTxH9tINdmzVugm6Kg0JRYezj1.jpg',
            'active' => true,
        ]);

        $this->assertEquals('Test', $post->title);
        $this->assertEquals('Pruebas de Usabilidad y Rendimiento', $post->body);
        $this->assertEquals('4bRqGIGIpaMKPsKTxH9tINdmzVugm6Kg0JRYezj1.jpg', $post->image_url);
        $this->assertTrue($post->active);
    }
}
