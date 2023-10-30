<?php

namespace Database\Factories;

use App\Models\User;
use Illuminate\Database\Eloquent\Factories\Factory;

class ItemFactory extends Factory
{
    public function definition(): array
    {
        return [
            'created_by' => User::factory()->create()->id,
            'name' => $this->faker->unique()->word(2),
            'description' => implode(' ', $this->faker->words()),
        ];
    }
}
