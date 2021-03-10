<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\RestData;

class RestdataTableSeeder extends Seeder
{

    public function run()
    {
        $param = [
            'message' => 'Google Japan',
            'url' => 'https://google.co.jp',
        ];
        $restdata = new RestData;
        $restdata->fill($param)->save();
        
        $param = [
            'message' => 'Yahoo Japan',
            'url' => 'https://yahoo.co.jp',
        ];
        $restdata = new RestData;
        $restdata->fill($param)->save();
        $param = [
            'message' => 'MSN Japan',
            'url' => 'https://msn.com/ja-jp',
        ];
        $restdata = new RestData;
        $restdata->fill($param)->save();
    }
}
