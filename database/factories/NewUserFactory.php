<?php

namespace Database\Factories;

use Illuminate\Support\Carbon;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\NewUser>
 */
class NewUserFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [

                'first_name' => $this->faker->firstName,
                'last_name' => $this->faker->lastName,
                'dob' => $this->faker->date,
                'gender' => $this->faker->randomElement(['Male', 'Female', 'Other']),
                'nationality' => $this->faker->country,
                'email' => $this->faker->unique()->safeEmail,
                'phone' => $this->faker->phoneNumber,
                'address' => $this->faker->address,
                'kin_name' => $this->faker->name,
                'kin_relationship' => $this->faker->randomElement(['Brother', 'Sister', 'Parent', 'Friend']),
                'kin_phone' => $this->faker->phoneNumber,
                'kin_address' => $this->faker->address,
                'undergrad_degree' => $this->faker->randomElement(['Bachelor of Science', 'Bachelor of Arts', 'Bachelor of Engineering']),
                'university' => $this->faker->company,
                'grad_year' => $this->faker->year,
                'gpa' => $this->faker->randomFloat(2, 0, 4.00),
                'experience' => $this->faker->sentence,
                'certificate' => null, // Assuming no file for factory
                'program' => $this->faker->word,
                'intake' => $this->faker->randomElement(['Spring', 'Fall', 'Winter', 'Summer']),
                'statement' => $this->faker->paragraph,
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now(),
        ];
    }
}
