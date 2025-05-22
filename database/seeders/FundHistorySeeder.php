<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class FundHistorySeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('fund_histories')->insert([
            [
                'fund_id' => rand(1, 10),
                'amount' => rand(1000, 100000),
                'funder_id' => rand(1, 2),
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'fund_id' => rand(1, 10),
                'amount' => rand(1000, 100000),
                'funder_id' => rand(1, 2),
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'fund_id' => rand(1, 10),
                'amount' => rand(1000, 100000),
                'funder_id' => rand(1, 2),
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'fund_id' => rand(1, 10),
                'amount' => rand(1000, 100000),
                'funder_id' => rand(1, 2),
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'fund_id' => rand(1, 10),
                'amount' => rand(1000, 100000),
                'funder_id' => rand(1, 2),
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'fund_id' => rand(1, 10),
                'amount' => rand(1000, 100000),
                'funder_id' => rand(1, 2),
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'fund_id' => rand(1, 10),
                'amount' => rand(1000, 100000),
                'funder_id' => rand(1, 2),
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'fund_id' => rand(1, 10),
                'amount' => rand(1000, 100000),
                'funder_id' => rand(1, 2),
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'fund_id' => rand(1, 10),
                'amount' => rand(1000, 100000),
                'funder_id' => rand(1, 2),
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'fund_id' => rand(1, 10),
                'amount' => rand(1000, 100000),
                'funder_id' => rand(1, 2),
                'created_at' => now(),
                'updated_at' => now(),
            ],
        ]);
    }
}
