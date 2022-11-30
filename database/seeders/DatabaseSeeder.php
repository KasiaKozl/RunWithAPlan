<?php

namespace Database\Seeders;

// use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;


class DatabaseSeeder extends Seeder
{
   //Seeding given tables with default data specified in Factories
    public function run()
    {
        $this->call([
            FormSeeder::class,
            PlanningSeeder::class,
            QuoteSeeder::class,
            RoleSeeder::class,
            UserSeeder::class
        ]);
    }
}
