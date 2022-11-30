<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\Planning;

class PlanningSeeder extends Seeder
{
     //Create fake inserts to db authomatically
    public function run()
    {
        Planning::factory()->count(15)->create();
    }
}
