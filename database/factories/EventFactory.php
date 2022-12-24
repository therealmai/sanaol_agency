<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;
use App\Models\Event;
use App\Models\User;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Event>
 */
class EventFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition()
    {
        $model = Event::class;

        return [
            'user_id'    => User::all()->random()->id,
            'title'      => $this->faker->words(10,true),
            'content'    => $this->faker->sentence(15),
            'image'      => $this->faker->imageUrl(388, 222),
            'author'     => $this->faker->name(),
            'event_type' => $this->faker->word(1),
            'location'   => $this->faker->address(),
            'date'       => $this->faker->dateTimeBetween(now(), '+1 year'),
            'ref'        => '#',
        ];
    }
}
