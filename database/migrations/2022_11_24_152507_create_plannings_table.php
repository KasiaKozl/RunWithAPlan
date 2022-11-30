<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    //Create table with defined columns 
    public function up()
    {
        Schema::create('plannings', function (Blueprint $table) {
            $table->id();
            $table->string('name');
            $table->timestamps();
        });
    }

    
    public function down()
    {
        Schema::dropIfExists('plannings');
    }
};
