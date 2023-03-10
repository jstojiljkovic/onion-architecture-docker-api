<?php

namespace Database\Factories;

use App\Models\Equipment;
use App\Models\Organisation;
use App\Models\User;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends Factory<Equipment>
 */
class EquipmentFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [
            'organisation_id' => Organisation::factory(),
            'user_id' => User::factory(),
            'name' => fake()->words(5, true),
            'description' => fake()->text(),
            'filename' => fake()->imageUrl(),
            'thumbnail' => fake()->imageUrl(),
        ];
    }
}
