<?php

namespace Database\Factories;

use App\Models\TodoTranslation;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Todo>
 */
class ToDoFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [
            'is_completed' => $this->faker->boolean,
        ];
    }

    public function withTodoTranslation(array $profileData = [])
    {
        return $this->has(TodoTranslation::factory()->state($profileData));
    }
}
