<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class FundSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('funds')->insert([[
            'name' => 'Movie Fund',
            'description' => 'We are creating a movie.',
            'owner_id' => 1,
            'category_id' => 1,
            'currAmount' => 10000,
            'targetAmount' => 100000,
            'approvalStatus' => ['pending', 'approved', 'declined', 'finished'][rand(0, 3) % 4],
            'approvedOrDeclinedBy' => 1,
            'created_at' => date('Y-m-d', rand(strtotime('2024-01-01'), strtotime('2024-12-31'))),
            'updated_at' => now(),
        ],[
            'name' => 'Makan Gratis Video Fund',
            'description' => 'We are creating a movie.',
            'owner_id' => 1,
            'category_id' => 1,
            'currAmount' => 10000,
            'targetAmount' => 100000,
            'approvalStatus' => ['pending', 'approved', 'declined', 'finished'][rand(0, 3) % 4],
            'approvedOrDeclinedBy' => 1,
            'created_at' => date('Y-m-d', rand(strtotime('2024-01-01'), strtotime('2024-12-31'))),
            'updated_at' => now(),
        ],[
            'name' => 'Mobile Legend Fund',
            'description' => 'We are creating a game.',
            'owner_id' => 1,
            'category_id' => 2,
            'currAmount' => 10000,
            'targetAmount' => 100000,
            'approvalStatus' => ['pending', 'approved', 'declined', 'finished'][rand(0, 3) % 4],
            'approvedOrDeclinedBy' => 1,
            'created_at' => date('Y-m-d', rand(strtotime('2024-01-01'), strtotime('2024-12-31'))),
            'updated_at' => now(),
        ],[
            'name' => 'KOF Fund',
            'description' => 'We are creating a game.',
            'owner_id' => 1,
            'category_id' => 2,
            'currAmount' => 10000,
            'targetAmount' => 100000,
            'approvalStatus' => ['pending', 'approved', 'declined', 'finished'][rand(0, 3) % 4],
            'approvedOrDeclinedBy' => 1,
            'created_at' => date('Y-m-d', rand(strtotime('2024-01-01'), strtotime('2024-12-31'))),
            'updated_at' => now(),
        ],[
            'name' => 'Pubeg Fund',
            'description' => 'We are creating a game.',
            'owner_id' => 1,
            'category_id' => 2,
            'currAmount' => 10000,
            'targetAmount' => 100000,
            'approvalStatus' => ['pending', 'approved', 'declined', 'finished'][rand(0, 3) % 4],
            'approvedOrDeclinedBy' => 1,
            'created_at' => date('Y-m-d', rand(strtotime('2024-01-01'), strtotime('2024-12-31'))),
            'updated_at' => now(),
        ],[
            'name' => 'Nemo Findings Fund',
            'description' => 'We are creating a movie.',
            'owner_id' => 1,
            'category_id' => 1,
            'currAmount' => 10000,
            'targetAmount' => 100000,
            'approvalStatus' => ['pending', 'approved', 'declined', 'finished'][rand(0, 3) % 4],
            'approvedOrDeclinedBy' => 1,
            'created_at' => date('Y-m-d', rand(strtotime('2024-01-01'), strtotime('2024-12-31'))),
            'updated_at' => now(),
        ],[
            'name' => 'Jakarta Arc Fund',
            'description' => 'We are creating a movie.',
            'owner_id' => 2,
            'category_id' => 1,
            'currAmount' => 10000,
            'targetAmount' => 100000,
            'approvalStatus' => ['pending', 'approved', 'declined', 'finished'][rand(0, 3) % 4],
            'approvedOrDeclinedBy' => 1,
            'created_at' => date('Y-m-d', rand(strtotime('2024-01-01'), strtotime('2024-12-31'))),
            'updated_at' => now(),
        ],[
            'name' => 'Sajjad The Movie Fund',
            'description' => 'We are creating a movie.',
            'owner_id' => 2,
            'category_id' => 1,
            'currAmount' => 10000,
            'targetAmount' => 100000,
            'approvalStatus' => ['pending', 'approved', 'declined', 'finished'][rand(0, 3) % 4],
            'approvedOrDeclinedBy' => 1,
            'created_at' => date('Y-m-d', rand(strtotime('2024-01-01'), strtotime('2024-12-31'))),
            'updated_at' => now(),
        ],[
            'name' => 'Nilou and Sajjad Last Season Fund',
            'description' => 'We are creating a movie.',
            'owner_id' => 2,
            'category_id' => 1,
            'currAmount' => 10000,
            'targetAmount' => 100000,
            'approvalStatus' => ['pending', 'approved', 'declined', 'finished'][rand(0, 3) % 4],
            'approvedOrDeclinedBy' => 1,
            'created_at' => date('Y-m-d', rand(strtotime('2024-01-01'), strtotime('2024-12-31'))),
            'updated_at' => now(),
        ],[
            'name' => 'Game Fund',
            'description' => 'We are creatign a game.',
            'owner_id' => 2,
            'category_id' => 2,
            'currAmount' => 10000,
            'targetAmount' => 100000,
            'approvalStatus' => ['pending', 'approved', 'declined', 'finished'][rand(0, 3) % 4],
            'approvedOrDeclinedBy' => 1,
            'created_at' => date('Y-m-d', rand(strtotime('2024-01-01'), strtotime('2024-12-31'))),
            'updated_at' => now(),
        ]]);
    }
}
