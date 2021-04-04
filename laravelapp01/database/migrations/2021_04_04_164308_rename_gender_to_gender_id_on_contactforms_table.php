<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class RenameGenderToGenderIdOnContactformsTable extends Migration
{

    public function up()
    {
        Schema::table('contactforms', function (Blueprint $table) {
            $table->renameColumn('gender', 'gender_id');
        });
    }


    public function down()
    {
        Schema::table('contactforms', function (Blueprint $table) {
            $table->renameColumn('gender_id', 'gender');
        });
    }
}
