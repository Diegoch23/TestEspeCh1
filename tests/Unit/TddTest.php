<?php

namespace Tests\Unit;

use Tests\TestCase;
use App\Models\Post;
use Illuminate\Foundation\Testing\RefreshDatabase;

class TddTest extends TestCase
{
    use RefreshDatabase;

    /** @test */
    public function a_post_can_be_created()
    {
        $post = Post::create([
            'title' => 'New Post Title',
            'body' => 'This is the body of the new post.',
        ]);

        $this->assertDatabaseHas('posts', [
            'title' => 'New Post Title',
            'body' => 'This is the body of the new post.',
        ]);
    }
}
