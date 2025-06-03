<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('users')->insert([[
            'name' => 'admin',
            'email' => 'admin@gmail.com',
            'email_verified_at' => now(),
            'password' => Hash::make('admin123'),
            'dob' => '2001-01-01',
            'nohp' => '081234567890',
            'jk' => 'pria',
            'role' => 'admin',
            'balance' => 1000000,
            'userImg' => 'AssetAdmin.png',
            'created_at' => now(),
            'updated_at' => now(),
        ],[
            'name' => 'user',
            'email' => 'user@gmail.com',
            'email_verified_at' => now(),
            'password' => Hash::make('user123'),
            'dob' => '2001-01-01',
            'nohp' => '081234567890',
            'jk' => 'wanita',
            'role' => 'user',
            'balance' => 1000000,
            'userImg' => 'AssetUser.png',
            'created_at' => now(),
            'updated_at' => now(),
        ],[
            'name' => 'staff',
            'email' => 'staff@gmail.com',
            'email_verified_at' => now(),
            'password' => Hash::make('staff123'),
            'dob' => '2001-01-01',
            'nohp' => '081234567890',
            'jk' => 'wanita',
            'role' => 'staff',
            'balance' => 1000000,
            'userImg' => 'AssetAdmin.png',
            'created_at' => now(),
            'updated_at' => now(),
        ]]);
    }
}
