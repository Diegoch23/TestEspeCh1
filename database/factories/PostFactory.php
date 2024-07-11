<?php
namespace Database\Factories;

use App\Models\Post;
use Illuminate\Database\Eloquent\Factories\Factory;

class PostFactory extends Factory
{
    protected $model = Post::class;

    public function definition()
    {
        return [
            'title' => $this->faker->sentence,
            'body' => $this->faker->paragraph,
            'image_url' => '4bRqGIGIpaMKPsKTxH9tINdmzVugm6Kg0JRYezj1.jpg',
            'active' => true,
        ];
    }
}

