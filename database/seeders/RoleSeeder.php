<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\Role;

class RoleSeeder extends Seeder
{
      //Create fake inserts to db authomatically
    public function run()
    {
        Role::factory()->create([
            'name' => 'COACH',
                ]);
    
            Role::factory()->create([
            'name' => 'RUNNER',
                ]);
    }
}
