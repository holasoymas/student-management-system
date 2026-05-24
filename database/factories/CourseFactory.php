<?php

namespace Database\Factories;

use App\Models\Course;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends Factory<Course>
 */
class CourseFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        $courses = [
            'CS-101' => 'Introduction to C Programming',
            'CS-102' => 'Digital Logic & Architecture',
            'CS-201' => 'Data Structures and Algorithms',
            'CS-202' => 'Database Management Systems',
            'CS-301' => 'Operating Systems & Linux Shell',
        ];

        $code = fake()->randomElement(array_keys($courses));

        return [
            'course_code' => $code,
            'name' =>  $courses[$code],
            'credits' => fake()->randomElement([2, 3, 4, 5]),
        ];
    }
}
