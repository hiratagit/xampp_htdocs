<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class AddEmailToFriendsTable extends Migration
{

    public function up()
    {
        Schema::table('friends', function (Blueprint $table) {
            $table->string('email')->nullable()->after('age')->comment('友達のメールアドレス');
        });
    }

    public function down()
    {
        Schema::table('friends', function (Blueprint $table) {
            $table->dropColumn('email');
        });
    }
}
