<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\SchoolClass>
 */
class SchoolClassFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        $subjects = ['Mathematics', 'Science', 'History', 'English', 'Art', 'Physics', 'Chemistry'];
        $grades = ['Grade 9', 'Grade 10', 'Grade 11', 'Grade 12'];
        
        $name = fake()->randomElement($grades) . ' - ' . fake()->randomElement($subjects);

        return [
            'name' => $name,
            'description' => fake()->sentence(),
        ];
    }
}
