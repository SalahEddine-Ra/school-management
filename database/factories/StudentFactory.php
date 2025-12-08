<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

use App\Models\User;
use App\Models\Student;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Student>
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
            'user_id' => User::factory(),
            'full_name' => fake()->name(),
            'email' => fake()->unique()->safeEmail(),
            'phone' => fake()->optional(0.7)->phoneNumber(),
            'age' => fake()->numberBetween(15, 25),
            'address' => fake()->streetAddress() . ', ' . fake()->city(),
            'birth_date' => fake()->dateTimeBetween('-25 years', '-15 years'),
            'gender' => fake()->randomElement(['male', 'female']),
        ];
    }

    public function configure()
    {
        return $this->afterCreating(function (Student $student) {
            $user = $student->user;
            if ($user) {
                $user->assignRole('student');
                $student->update([
                    'full_name' => $user->name,
                    'email' => $user->email,
                ]);
            }
        });
    }
}
