<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Task>
 */
class TaskFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [
            'todo' => fake()->words(2, true),
            'tanggal' => fake()->dateTimeBetween('now', '+1 week')->format('Y-m-d'),
            'jam' => fake()->time('H:i'),
            'status' => fake()->randomElement(['belum', 'sedang', 'sudah']),
        ];
    }
}
