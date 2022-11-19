<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;
use Illuminate\Support\Str;
use Illuminate\Support\Facades\Hash;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\User>
 */
class UserFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition()
    {
        $user_types = ['general', 'admin', 'talent'];
        return [
            'fname'             => $this->faker->firstName(),
            'lname'             => $this->faker->lastName(),
            'email'             => $this->faker->unique()->safeEmail(),
            'password'          => Hash::make('password'), // password
            'user_type'         => $user_types[rand(0,2)],
            'insta_handle'      => $this->faker->userName(),
            'is_member'         => rand(0,1)
        ];
    }

    /**
     * Indicate that the model's email address should be unverified.
     *
     * @return static
     */
    public function unverified()
    {
        return $this->state(fn (array $attributes) => [
            'email_verified_at' => null,
        ]);
    }
}
