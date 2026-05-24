<?php

namespace Database\Factories;

use App\Models\Grade;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends Factory<Grade>
 */
class GradeFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [
            'assessment_name' => fake()->randomElement([
                'Attendance',
                'Midterm Exam',
                'Practical Lab',
                'Final Exam'
            ]),
            'total_marks' => 100.00,
            'marks_obtained' => fake()->randomFloat(2, 20, 100),
        ];
    }
}
