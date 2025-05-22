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

        $admins = User::where('role', 'admin')->get();
        $users = User::where('role', 'user')->get();

        foreach ($funds as $fund) {
            $admin = $admins->random();

            $staff = $users->random();

            DB::table('chats')->insert([
                'fund_id' => $fund->id,
                'staff_id' => $staff->id,
                'funder_id' => $admin->id,
                'created_at' => now(),
                'updated_at' => now(),
            ]);
        }
    }
}
