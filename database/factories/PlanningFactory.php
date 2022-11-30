<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

 //Defining default data that should be inserted in db with seeders
class PlanningFactory extends Factory
{
   
    public function definition()
    {
        return [
            'name' => fake()->file()
        ];
    }
}
