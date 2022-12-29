<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;
use App\Models\Event;
use App\Models\User;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\InvolvedTalent>
 */
class InvolvedTalentFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition()
    {
        $user = User::all()->where('user_type', 'talent')->random();
        $user->is_member = true;
        $user->save();
        return [
            'events_id'  => Event::all()->where('is_deleted', 0)->random()->id,
            'user_id'    => $user->id,
            'is_deleted' => rand(0,1)
        ];
    }
}
