<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

class PeoplesFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        return [
            // 'name' => $this->faker->name(),
            // 'email' => $this->faker->unique()->safeEmail(),
            // 'email_verified_at' => now(),
            // 'password' => '$2y$10$92IXUNpkjO0rOQ5byMi.Ye4oKoEa3Ro9llC/.og/at2.uheWG/igi', // password
            // 'remember_token' => Str::random(10),

            'name' => $this->faker->name(),
            'father_name' => $this->faker->titleMale(),
            'mother_name' => $this->faker->titleFemale(),
            'age' => $this->faker->numberBetween($min = 18, $max = 50),
            'address' => $this->faker->address(),
            'email' => $this->faker->unique()->safeEmail(),
        ];
    }
}
