<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\Form;

class FormSeeder extends Seeder
{
   //Create fake inserts to db authomatically
    public function run()
    {
        Form::factory()->count(15)->create();
    }
}
