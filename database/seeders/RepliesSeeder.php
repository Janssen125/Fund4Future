<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class RepliesSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('replies')->insert([[
            'comments_id' => 1,
            'user_id' => 2,
            'replyText' => 'This is a reply from user 2 to comment 1',
            'created_at' => now(),
            'updated_at' => now(),
        ],[
            'comments_id' => 1,
            'user_id' => 2,
            'replyText' => 'This is a reply from user 2 to comment 1 again',
            'created_at' => now(),
            'updated_at' => now(),
        ],[
            'comments_id' => 2,
            'user_id' => 1,
            'replyText' => 'This is a reply from user 1 to comment 2',
            'created_at' => now(),
            'updated_at' => now(),
        ],[
            'comments_id' => 3,
            'user_id' => rand(1, 2),
            'replyText' => 'Random reply text for comment 3 - first reply',
            'created_at' => now(),
            'updated_at' => now(),
        ],[
            'comments_id' => 3,
            'user_id' => rand(1, 2),
            'replyText' => 'Random reply text for comment 3 - second reply',
            'created_at' => now(),
            'updated_at' => now(),
        ],[
            'comments_id' => 4,
            'user_id' => rand(1, 2),
            'replyText' => 'Random reply text for comment 4',
            'created_at' => now(),
            'updated_at' => now(),
        ],[
            'comments_id' => 5,
            'user_id' => rand(1, 2),
            'replyText' => 'Random reply text for comment 5 - first reply',
            'created_at' => now(),
            'updated_at' => now(),
        ],[
            'comments_id' => 5,
            'user_id' => rand(1, 2),
            'replyText' => 'Random reply text for comment 5 - second reply',
            'created_at' => now(),
            'updated_at' => now(),
        ],[
            'comments_id' => 6,
            'user_id' => rand(1, 2),
            'replyText' => 'Random reply text for comment 6',
            'created_at' => now(),
            'updated_at' => now(),
        ],[
            'comments_id' => 7,
            'user_id' => rand(1, 2),
            'replyText' => 'Random reply text for comment 7 - first reply',
            'created_at' => now(),
            'updated_at' => now(),
        ],[
            'comments_id' => 7,
            'user_id' => rand(1, 2),
            'replyText' => 'Random reply text for comment 7 - second reply',
            'created_at' => now(),
            'updated_at' => now(),
        ],[
            'comments_id' => 8,
            'user_id' => rand(1, 2),
            'replyText' => 'Random reply text for comment 8',
            'created_at' => now(),
            'updated_at' => now(),
        ],[
            'comments_id' => 9,
            'user_id' => rand(1, 2),
            'replyText' => 'Random reply text for comment 9 - first reply',
            'created_at' => now(),
            'updated_at' => now(),
        ],[
            'comments_id' => 9,
            'user_id' => rand(1, 2),
            'replyText' => 'Random reply text for comment 9 - second reply',
            'created_at' => now(),
            'updated_at' => now(),
        ],[
            'comments_id' => 10,
            'user_id' => rand(1, 2),
            'replyText' => 'Random reply text for comment 10',
            'created_at' => now(),
            'updated_at' => now(),
        ],[
            'comments_id' => 11,
            'user_id' => rand(1, 2),
            'replyText' => 'Random reply text for comment 11 - first reply',
            'created_at' => now(),
            'updated_at' => now(),
        ],[
            'comments_id' => 11,
            'user_id' => rand(1, 2),
            'replyText' => 'Random reply text for comment 11 - second reply',
            'created_at' => now(),
            'updated_at' => now(),
        ],[
            'comments_id' => 12,
            'user_id' => rand(1, 2),
            'replyText' => 'Random reply text for comment 12',
            'created_at' => now(),
            'updated_at' => now(),
        ],[
            'comments_id' => 13,
            'user_id' => rand(1, 2),
            'replyText' => 'Random reply text for comment 13 - first reply',
            'created_at' => now(),
            'updated_at' => now(),
        ],[
            'comments_id' => 13,
            'user_id' => rand(1, 2),
            'replyText' => 'Random reply text for comment 13 - second reply',
            'created_at' => now(),
            'updated_at' => now(),
        ],[
            'comments_id' => 14,
            'user_id' => rand(1, 2),
            'replyText' => 'Random reply text for comment 14',
            'created_at' => now(),
            'updated_at' => now(),
        ],[
            'comments_id' => 15,
            'user_id' => rand(1, 2),
            'replyText' => 'Random reply text for comment 15 - first reply',
            'created_at' => now(),
            'updated_at' => now(),
        ],[
            'comments_id' => 15,
            'user_id' => rand(1, 2),
            'replyText' => 'Random reply text for comment 15 - second reply',
            'created_at' => now(),
            'updated_at' => now(),
        ],[
            'comments_id' => 16,
            'user_id' => rand(1, 2),
            'replyText' => 'Random reply text for comment 16',
            'created_at' => now(),
            'updated_at' => now(),
        ],[
            'comments_id' => 17,
            'user_id' => rand(1, 2),
            'replyText' => 'Random reply text for comment 17 - first reply',
            'created_at' => now(),
            'updated_at' => now(),
        ],[
            'comments_id' => 17,
            'user_id' => rand(1, 2),
            'replyText' => 'Random reply text for comment 17 - second reply',
            'created_at' => now(),
            'updated_at' => now(),
        ],[
            'comments_id' => 18,
            'user_id' => rand(1, 2),
            'replyText' => 'Random reply text for comment 18',
            'created_at' => now(),
            'updated_at' => now(),
        ],[
            'comments_id' => 19,
            'user_id' => rand(1, 2),
            'replyText' => 'Random reply text for comment 19 - first reply',
            'created_at' => now(),
            'updated_at' => now(),
        ],[
            'comments_id' => 19,
            'user_id' => rand(1, 2),
            'replyText' => 'Random reply text for comment 19 - second reply',
            'created_at' => now(),
            'updated_at' => now(),
        ],[
            'comments_id' => 20,
            'user_id' => rand(1, 2),
            'replyText' => 'Random reply text for comment 20',
            'created_at' => now(),
            'updated_at' => now(),
            ],
        ]);
    }
}
