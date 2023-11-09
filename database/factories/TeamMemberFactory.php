<?php

namespace Database\Factories;

use App\Models\Devision;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\TeamMember>
 */
class TeamMemberFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [
            'name' => fake()->name(),
            'image_url' => 'https://random.imagecdn.app/500/300'.fake()->hexColor(). '/cf4040?text='. fake()->firstName()."+".fake()->lastName(),
            'qualification' =>  "sertified as ".fake()->titleMale()
        ];
    }
}
