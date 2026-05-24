<?php

namespace Database\Factories;

use App\Models\Student;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends Factory<Student>
 */
class StudentFactory extends Factory
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
            'email' =>  fake()->unique()->safeEmail(),
            'address' => fake()->address,
            'contact' => fake()->unique()->phoneNumber(),
            'roll_number' => 'TU-' . date('Y') . '-' . fake()->unique()->numberBetween(100000, 999999),
            'dob' => fake()->date('Y-m-d', '-18 years') // at least 18 years old
        ];
    }
}
