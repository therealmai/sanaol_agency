<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;
use App\Models\User;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\HeroBanner>
 */
class HeroBannerFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition()
    {
        return [
            'user_id'         => User::all()->random()->id,
            'header_tal'      => $this->faker->words(5, true),
            'subheader_tal'   => $this->faker->sentence(7),
            'header_gen'      => $this->faker->words(5, true),
            'subheader_gen'   => $this->faker->sentence(7),
            'preview_events'  => rand(0,10),
            'preview_news'    => rand(0,10),
        ];
    }
}
