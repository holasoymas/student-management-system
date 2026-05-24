<?php

namespace Database\Seeders;

use App\Models\Course;
use App\Models\Enrollment;
use App\Models\Grade;
use App\Models\Student;
use App\Models\User;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;

class DatabaseSeeder extends Seeder
{
    use WithoutModelEvents;

    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        // User::factory(10)->create();

        User::factory()->create([
            'name' => 'Test User',
            'email' => 'test@example.com',
            'password' => Hash::make('password123'),
        ]);

        $courseTemplates = [
            'CS-101' => ['name' => 'Introduction to C Programming', 'credits' => 2],
            'CS-102' => ['name' => 'Digital Logic & Architecture', 'credits' => 4],
            'CS-201' => ['name' => 'Data Structures and Algorithms', 'credits' => 4],
            'CS-202' => ['name' => 'Database Management Systems', 'credits' => 3],
            'CS-301' => ['name' => 'Operating Systems & Linux Shell', 'credits' => 5],
        ];

        $courses = collect();

        foreach ($courseTemplates as $code => $data) {
            $courses->push(
                Course::create([
                    'course_code' => $code,
                    'name' => $data['name'],
                    'credits' => $data['credits'],
                ])
            );
        }

        $students = Student::factory()->count(30)->create();

        // The 4 strict assessment types we need for every single class enrollment
        $assessments = [
            ['name' => 'Attendance', 'max' => 10.00],
            ['name' => 'Midterm Exam', 'max' => 30.00],
            ['name' => 'Practical Lab', 'max' => 20.00],
            ['name' => 'Final Exam', 'max' => 40.00],
        ];

        // 4. Relational Seeding Loop
        foreach ($students as $student) {

            $randomCourses = $courses->random(rand(2, 3));

            foreach ($randomCourses as $course) {

                $enrollment = Enrollment::create([
                    'student_id' => $student->id,
                    'course_id' => $course->id,
                    'semester' => 'Spring 2026',
                ]);

                foreach ($assessments as $assessment) {

                    // Generate a  score (e.g., between 50% and 100% of maximum marks)
                    $minMark = $assessment['max'] * 0.5;
                    $obtained = fake()->randomFloat(2, $minMark, $assessment['max']);

                    Grade::create([
                        'enrollment_id'   => $enrollment->id,
                        'assessment_name' => $assessment['name'],
                        'total_marks'     => $assessment['max'],
                        'marks_obtained'  => $obtained,
                    ]);
                }
            }
        }
    }
}
