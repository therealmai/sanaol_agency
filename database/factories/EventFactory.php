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

        $event_types = ['Fan Event', 'Press Conference', 'Pageant', 'Fashion Show', 'Concert'];
        $type = $event_types[rand(0,4)];

        $user = User::all()->where('user_type', 'admin')->random();
        $user->is_member = true;
        $user->save();

        return [
            'user_id'    => $user->id,
            'title'      => $this->faker->words(10,true),
            'content'    => $this->faker->sentences(15, true),
            'image'      => $this->faker->imageUrl(388, 222),
            'author'     => $user->fname.' '.$user->lname,
            'event_type' => $type,
            'location'   => $this->faker->address(),
            'date'       => $this->faker->dateTimeBetween(now(), '+1 year'),
            'ref'        => '#',
        ];
    }
}
