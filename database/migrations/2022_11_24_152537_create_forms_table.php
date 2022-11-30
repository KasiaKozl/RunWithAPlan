<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;
use App\Models\User;

return new class extends Migration
{
    //Create table with defined columns 
    public function up()
    {
        Schema::create('forms', function (Blueprint $table) {
            $table->id();
            $table->foreignIdFor(User::class);
            $table->string('level');
            $table->string('time');
            $table->string('distance');
            $table->timestamps();
        });
    }

   
    public function down()
    {
        Schema::dropIfExists('forms');
    }
};
