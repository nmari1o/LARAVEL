<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;
use App\Models\Student;
use App\Models\Smjer;
/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Book>
 */



class StudentFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */

     protected $model = Student::class;

   

    public function definition(): array
    {
       
       
       return [
            'ime' => $this->faker->name,
            'prezime' => $this->faker->name,
            'student_smjer' => Smjer::all()->random()
        ];
    }
}
