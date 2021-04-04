<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateGenderTable extends Migration
{
    public function up()
    {
        Schema::create('gender', function (Blueprint $table) {
            $table->id();
            $table->string('gender_name');
            $table->timestamps();
        });
    }

    public function down()
    {
        Schema::dropIfExists('gender');
    }
}
