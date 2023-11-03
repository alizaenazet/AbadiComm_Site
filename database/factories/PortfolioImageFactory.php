<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\PortfolioImage>
 */
class PortfolioImageFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [
<<<<<<< Updated upstream
            'image_url' => 'https://image.dummyjson.com/400x200/'.fake()->hexColor(). '/cf4040?text='. fake()->firstName()."+".fake()->lastName(),
=======
            'image_url' => 'https://random.imagecdn.app/300/300'.fake()->hexColor(). '/cf4040?text='. fake()->firstName()."+".fake()->lastName(),
>>>>>>> Stashed changes
        ];
    }
}
