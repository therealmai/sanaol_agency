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

        $user = User::all()->where('user_type', 'admin')->random();
        $user->is_member = true;
        $user->save();

        return [
            'user_id'    => $user->id,
            'title'      => $this->faker->words(5, true),
            'content'    => $this->faker->sentences(15, true),
            'image'      => $this->faker->imageUrl(880,495),
            'ref'        => '#',
        ];
    }
}
