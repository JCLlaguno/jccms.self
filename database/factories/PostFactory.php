<?php

namespace Database\Factories;

use App\Models\Post;
use App\Models\User;
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
            // 'title' => $this->faker->sentence($nbWords = 6, $variableNbWords = true),
            // 'body' => $this->faker->paragraph($nbSentences = 3, $variableNbSentences = true)
            
            'user_id'=> 4,
            'image' => $this->faker->imageUrl($width = 900, $height = 400),
            'title' => $this->faker->sentence,
            'body' => $this->faker->paragraph
        ];
    }
}
