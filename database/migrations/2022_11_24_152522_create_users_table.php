<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;
use App\Models\Role;
use App\Models\Planning;

return new class extends Migration
{
    //Create table with defined columns 
    public function up()
    {
        Schema::create('users', function (Blueprint $table) {
            $table->id();
            $table->string('name');
            $table->string('email');
            $table->string('password');
            $table->string('phone');
            $table->foreignIdFor(Role::class);
            // 0->guest, 1->coach, 2->runner
            $table->foreignIdFor(Planning::class);
            $table->timestamps();
        });
    }

   
    public function down()
    {
        Schema::dropIfExists('users');
    }
};
