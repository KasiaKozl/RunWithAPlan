<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;
use App\Models\Role;
use App\Models\Planning;


class UserFactory extends Factory
{
   //Defining default data that should be inserted in db with seeders
    public function definition()
    {

        //get foreign keys from Role and Planning tables
        $roles = Role::all()->pluck('id');
        $plannings = Planning::all()->pluck('id');

        return [
            'name'           => fake()->name(),
            'email'          => fake()->unique()->safeEmail(),
            'password'       => fake()->password(),
            'phone'          => fake()->phoneNumber(),
            'role_id'        => fake()->randomElement($roles),
            'planning_id'    => fake()->randomElement($plannings)
        ];
    }

    /**
     * Indicate that the model's email address should be unverified.
     *
     * @return static
     */
    public function unverified()
    {
        return $this->state(fn (array $attributes) => [
            'email_verified_at' => null,
        ]);
    }
}
