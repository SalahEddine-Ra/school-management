<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

use App\Models\User;
use App\Models\Teacher;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Teacher>
 */
class TeacherFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [
            'user_id' => User::factory(),
            'full_name' => fake()->name(),
            'email' => fake()->unique()->safeEmail(),
            'phone' => fake()->phoneNumber(),
            'subject' => fake()->randomElement(['Mathematics', 'Science', 'History', 'English', 'Art', 'Physical Education', 'Islamic Studies']),
            'date_of_birth' => fake()->dateTimeBetween('-60 years', '-25 years'),
            'qualification' => fake()->randomElement(['B.Ed', 'M.Ed', 'Ph.D']),
            'address' => fake()->streetAddress() . ', ' . fake()->city(),
            'gender' => fake()->randomElement(['male', 'female']),
            'hired_at' => fake()->dateTimeBetween('-10 years', 'now'),
            'status' => fake()->randomElement(['active', 'on_leave', 'inactive']),
            'salary' => fake()->numberBetween(30000, 100000),
        ];
    }

    public function configure()
    {
        return $this->afterCreating(function (Teacher $teacher) {
            $user = $teacher->user;
            if ($user) {
                $user->assignRole('teacher');
                $teacher->update([
                    'full_name' => $user->name,
                    'email' => $user->email,
                ]);
            }
        });
    }
}
