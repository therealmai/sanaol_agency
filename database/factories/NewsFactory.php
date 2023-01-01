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
        $user = User::all()->where('user_type', 'admin')->random();
        $user->is_member = true;
        $user->save();

        return [
            'user_id'    => $user->id,
            'title'      => $this->faker->words(5, true),
            'content'    => $this->faker->sentences(75, true),
            'image'      => $this->faker->imageUrl(880,495),
            'location'   => $this->faker->address(),
            'date'       => $this->faker->dateTimeBetween(now(), '+1 year'),
            'author'     => $user->fname.' '.$user->lname,
            'ref'        => '#',
            'is_deleted' => rand(0,1)
        ];
    }
}
