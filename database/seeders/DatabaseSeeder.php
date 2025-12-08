<?php

namespace Database\Seeders;

use App\Models\User;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    use WithoutModelEvents;

    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        $this->call(RoleAndAdminSeeder::class);

        // Create Students
        $students = \App\Models\Student::factory(100)->create();

        // Create Teachers
        $teachers = \App\Models\Teacher::factory(20)->create();

        // Create Classes
        $classes = \App\Models\SchoolClass::factory(10)->create();

        // Assign Students and Teachers to Classes
        foreach ($classes as $class) {
            // Assign 15-30 random students
            $class->students()->attach(
                $students->random(rand(15, 30))->pluck('id')->toArray()
            );

            // Assign 1-3 random teachers
            $class->teachers()->attach(
                $teachers->random(rand(1, 3))->pluck('id')->toArray()
            );
        }
    }
}
