<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;

class FriendsTableSeeder extends Seeder
{

    public function run() {
        factory(App\Models\Friend::class, 50)->create();
    }
    
        
}
