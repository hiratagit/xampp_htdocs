<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateContactformTable extends Migration
{

    public function up()
    {
        Schema::create('contactform', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->string('name');
            $table->string('tel');
            $table->string('email');
            $table->integer('gender');
            $table->string('kind');
            $table->text('text');
            $table->timestamps();
        });
    }

    public function down()
    {
        Schema::dropIfExists('contactform');
    }
}
