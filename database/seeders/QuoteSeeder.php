<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\Quote;

class QuoteSeeder extends Seeder
{
     //Create fake inserts to db authomatically
    public function run()
    {
        Quote::factory()->count(15)->create();
    }
}
