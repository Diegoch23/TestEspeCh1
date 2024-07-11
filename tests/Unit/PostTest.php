<?php 
namespace Tests\Unit;

use PHPUnit\Framework\TestCase;
use App\Models\Post;

class PostTest extends TestCase
{
    public function testPostModel()
    {
        $post = new Post([
            'title' => 'Diego Chancusig',
            'body' => 'Este es un blog de pruebas de Rendimiento y Usabilidad',
            'image_url' => 'images//r0bpZvfpd4rxZDPymF5KUzERtBUqu36S5nn90GHu.gif',
            'active' => true,
        ]);

        $this->assertEquals('Diego Chancusig', $post->title);
        $this->assertEquals('Este es un blog de pruebas de Rendimiento y Usabilidad', $post->body);
        $this->assertEquals('images//r0bpZvfpd4rxZDPymF5KUzERtBUqu36S5nn90GHu.gif', $post->image_url);
        $this->assertTrue($post->active);
    }
}
