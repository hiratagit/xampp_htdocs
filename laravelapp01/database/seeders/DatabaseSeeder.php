<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    public function run()
    {
        // \App\Models\User::factory(10)->create();
        //\App\Models\Contactform::factory(50)->create();
        $this->call(GenderTableSeeder::class);
    }
}
