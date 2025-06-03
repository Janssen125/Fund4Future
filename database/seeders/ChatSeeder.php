<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use App\Models\Fund;
use App\Models\User;

class ChatSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $funds = Fund::all();
        $users = User::all();
        foreach ($funds as $fund) {

            $user1 = $users->random();
            do{
            $user2 = $users->random();
            } while ($user1->id === $user2->id);

            DB::table('chats')->insert([
                'fund_id' => $fund->id,
                'staff_id' => $user1->id,
                'funder_id' => $user2->id,
                'status' => 'active',
                'created_at' => now(),
                'updated_at' => now(),
            ]);
        }
    }
}
