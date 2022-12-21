<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;
use App\Models\User;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\News>
 */
class NewsFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition()
    {
        return [
            'user_id'    => User::all()->random()->id,
            'title'      => $this->faker->words(5, true),
            'content'    => $this->faker->sentence(10),
            'image'      => $this->faker->imageUrl(880,495),
            'location'   => $this->faker->address(),
            'date'       => $this->faker->dateTimeBetween(now(), '+1 year'),
            'author'     => $this->faker->name(),
            'ref'        => '#',
            'is_deleted' => rand(0,1)
        ];
    }
}
