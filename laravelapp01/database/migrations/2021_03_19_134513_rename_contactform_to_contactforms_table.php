<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class RenameContactformToContactformsTable extends Migration
{

    public function up()
    {
        Schema::rename('contactform', 'contactforms');
    }


    public function down()
    {
        Schema::rename('contactforms', 'contactform');
    }
}
