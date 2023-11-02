<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Article>
 */
class ArticleFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [
            'title' => fake()->name(),
            'image_url'=> 'https://image.dummyjson.com/400x200/'.fake()->hexColor(). '/cf4040?text='. fake()->firstName()."+".fake()->lastName(),
            'date' => fake()->date(),
            'content' => fake()->text(3000)
        ];
    }
}
