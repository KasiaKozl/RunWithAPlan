<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
   //Create table with defined columns 

    public function up()
    {
        Schema::create('trainings', function (Blueprint $table) {
            $table->id();
            $table->string('level');
            $table->string('distance');
            $table->string('time');
            $table->binary('file_name');
            $table->timestamps();
        });
    }

   
    public function down()
    {
        Schema::dropIfExists('trainings');
    }
};

