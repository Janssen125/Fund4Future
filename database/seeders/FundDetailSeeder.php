<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class FundDetailSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('fund_details')->insert([
            [
                'fund_id' => 1,
                'types' => 'image',
                'imageOrVideo' => 'Dummy_Movie.jpg',
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'fund_id' => 1,
                'types' => 'video',
                'imageOrVideo' => 'Dummy_Movie.mp4',
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'fund_id' => 2,
                'types' => 'image',
                'imageOrVideo' => 'Dummy_Movie.jpg',
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'fund_id' => 2,
                'types' => 'video',
                'imageOrVideo' => 'Dummy_Movie.mp4',
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'fund_id' => 3,
                'types' => 'image',
                'imageOrVideo' => 'Dummy_Game.jpg',
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'fund_id' => 3,
                'types' => 'video',
                'imageOrVideo' => 'Dummy_Game.mp4',
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'fund_id' => 4,
                'types' => 'image',
                'imageOrVideo' => 'Dummy_Game.jpg',
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'fund_id' => 4,
                'types' => 'video',
                'imageOrVideo' => 'Dummy_Game.mp4',
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'fund_id' => 5,
                'types' => 'image',
                'imageOrVideo' => 'Dummy_Game.jpg',
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'fund_id' => 5,
                'types' => 'video',
                'imageOrVideo' => 'Dummy_Game.mp4',
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'fund_id' => 6,
                'types' => 'image',
                'imageOrVideo' => 'Dummy_Movie.jpg',
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'fund_id' => 6,
                'types' => 'video',
                'imageOrVideo' => 'Dummy_Movie.mp4',
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'fund_id' => 7,
                'types' => 'image',
                'imageOrVideo' => 'Dummy_Movie.jpg',
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'fund_id' => 7,
                'types' => 'video',
                'imageOrVideo' => 'Dummy_Movie.mp4',
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'fund_id' => 8,
                'types' => 'image',
                'imageOrVideo' => 'Istri_Sajjad.jpg',
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'fund_id' => 8,
                'types' => 'video',
                'imageOrVideo' => 'Istri_Sajjad.mp4',
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'fund_id' => 9,
                'types' => 'image',
                'imageOrVideo' => 'Istri_Sajjad.jpg',
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'fund_id' => 9,
                'types' => 'video',
                'imageOrVideo' => 'Istri_Sajjad.mp4',
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'fund_id' => 10,
                'types' => 'image',
                'imageOrVideo' => 'Dummy_Game.jpg',
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'fund_id' => 10,
                'types' => 'video',
                'imageOrVideo' => 'Dummy_Game.mp4',
                'created_at' => now(),
                'updated_at' => now(),
            ],
        ]);
    }
}
