<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;
use App\Models\User;


class FormFactory extends Factory
{
    //Defining default data that should be inserted in db with seeders
    public function definition()
    {
        $users = User::all()->pluck('id');

        return [
        'user_id'   => fake()->randomElement($users),
        'level'     => fake()->randomElement(['beginner', 'intermediate', 'avanced']),
        'time'      => fake()-> randomElement(['4', '8', '12']),
        'distance'  => fake()-> randomElement(['5', '10'])
        ];
    }
}
