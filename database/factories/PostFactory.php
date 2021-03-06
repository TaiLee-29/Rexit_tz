<?php

namespace Database\Factories;

use App\Models\Post;
use Illuminate\Database\Eloquent\Factories\Factory;

class PostFactory extends Factory
{
    /**
     * The name of the factory's corresponding model.
     *
     * @var string
     */
    protected $model = Post::class;

    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        return [
                'title'      =>$this->faker->unique()->sentence(rand(3,5)),
                'body'       =>$this->faker->paragraph(rand(7, 10)),
                'file'=>'null'
        ];
    }
}
