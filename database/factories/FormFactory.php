<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;
use App\Models\User;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Form>
 */
class FormFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition()
    {
        $users = User::all()->pluck('id');

        return [
            //
        'user_id'   => fake()->randomElement($users),
        'level'     => fake()->randomElement(['beginner', 'intermediate', 'avanced']),
        'time'      => fake()-> randomElement(['4', '8', '12']),
        'distance'  => fake()-> randomElement(['5', '10'])
        ];
    }
}
