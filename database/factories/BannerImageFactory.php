<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;
use App\Models\HeroBanner;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\HeroBanner>
 */
class BannerImageFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition()
    {
        return [
            'hero_id'    => HeroBanner::all()->random()->id,
            'image'      => $this->faker->imageUrl(1920,892),
            'is_deleted' => rand(0,1)
        ];
    }
}
