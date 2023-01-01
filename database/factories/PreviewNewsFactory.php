<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;
use App\Models\News;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\PreviewNews>
 */
class PreviewNewsFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition()
    {
        return [
            'news_id'  => News::all()->random()->id,
        ];
    }
}
