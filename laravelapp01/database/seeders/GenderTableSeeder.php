<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB; 

class GenderTableSeeder extends Seeder
{
    public function run()
    {
        $param = [
            'gender_name' => '男'
        ];

        DB::table('gender')->insert($param);

        $param = [
            'gender_name' => '女'
        ];

        DB::table('gender')->insert($param);

    }
}
