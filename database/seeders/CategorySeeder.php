<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class CategorySeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('categories')->insert([[
            'catName' => 'Movie',
            'created_at' => now(),
            'updated_at' => now(),
        ],[
            'catName' => 'Games',
            'created_at' => now(),
            'updated_at' => now(),
        ]]);
    }
}
