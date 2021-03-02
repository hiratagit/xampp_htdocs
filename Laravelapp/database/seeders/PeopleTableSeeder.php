<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class PeopleTableSeeder extends Seeder
{

    public function run()
    {
        $param = [
            'name' => 'taro',
            'mail' => '1234@gmail.com',
            'age' => '15',
        ];

        DB::table('people')->insert($param);

        $param = [
            'name' => 'hanako',
            'mail' => 'hanako@yahoo.co.jp',
            'age' => '23',
        ];

        DB::table('people')->insert($param);

        $param = [
            'name' => 'sachiko',
            'mail' => 'sachiko@happy.jp',
            'age' => '18',
        ];

        DB::table('people')->insert($param);
        
        $param = [
            'name' => 'nobu',
            'mail' => 'dzdq@gmai.com',
            'age' => '48',
        ];

        DB::table('people')->insert($param);

        $param = [
            'name' => 'shino',
            'mail' => 'shinon-t@yahoo.co.jp',
            'age' => '46',
        ];

        DB::table('people')->insert($param);
    }
}
