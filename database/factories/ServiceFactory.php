<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;
use App\Models\Service;
use App\Models\User;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Service>
 */
class ServiceFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition()
    {
        $model = Service::class;
        return [
            'user_id'    => User::all()->random()->id,
            'title'      => $this->faker->words(5, true),
            'content'    => $this->faker->sentence(10),
            'image'      => $this->faker->imageUrl(880,495),
            'ref'        => '#',
            'is_deleted' => rand(0,1)
        ];
    }
}
