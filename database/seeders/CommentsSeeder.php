<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class CommentsSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('comments')->insert([[
            'user_id' => 1,
            'fund_id' => 1,
            'comment' => 'Ayo dukung penggalangan ini',
            'created_at' => now(),
            'updated_at' => now(),
        ],[
            'user_id' => 2,
            'fund_id' => 1,
            'comment' => 'Penggalangan ini butuh lebih banyak perhatian (gatau mau komen apa, lorem aja deh)             Lorem ipsum dolor sit amet consectetur adipisicing elit. Ducimus ex quis quae exercitationem quaerat blanditiis! Quo sint id reprehenderit voluptatum soluta laboriosam hic minus! Error earum nam dolorum inventore quo.',
            'created_at' => now(),
            'updated_at' => now(),
        ],[
            'user_id' => 1,
            'fund_id' => 2,
            'comment' => 'Mari kita selesaikan penggalangan ini',
            'created_at' => now(),
            'updated_at' => now(),
        ],[
            'user_id' => 2,
            'fund_id' => 2,
            'comment' => 'Penggalangan ini butuh lebih banyak perhatian (gatau mau komen apa, lorem aja deh)             Lorem ipsum dolor sit amet consectetur adipisicing elit. Ducimus ex quis quae exercitationem quaerat blanditiis! Quo sint id reprehenderit voluptatum soluta laboriosam hic minus! Error earum nam dolorum inventore quo.',
            'created_at' => now(),
            'updated_at' => now(),
        ],[
            'user_id' => 1,
            'fund_id' => 3,
            'comment' => 'Penggalangan ini butuh lebih banyak perhatian (gatau mau komen apa, lorem aja deh)             Lorem ipsum dolor sit amet consectetur adipisicing elit. Ducimus ex quis quae exercitationem quaerat blanditiis! Quo sint id reprehenderit voluptatum soluta laboriosam hic minus! Error earum nam dolorum inventore quo.',
            'created_at' => now(),
            'updated_at' => now(),
        ],[
            'user_id' => 2,
            'fund_id' => 3,
            'comment' => 'Penggalangan ini butuh lebih banyak perhatian (gatau mau komen apa, lorem aja deh)             Lorem ipsum dolor sit amet consectetur adipisicing elit. Ducimus ex quis quae exercitationem quaerat blanditiis! Quo sint id reprehenderit voluptatum soluta laboriosam hic minus! Error earum nam dolorum inventore quo.',
            'created_at' => now(),
            'updated_at' => now(),
        ],[
            'user_id' => 1,
            'fund_id' => 4,
            'comment' => 'Penggalangan ini butuh lebih banyak perhatian (gatau mau komen apa, lorem aja deh)             Lorem ipsum dolor sit amet consectetur adipisicing elit. Ducimus ex quis quae exercitationem quaerat blanditiis! Quo sint id reprehenderit voluptatum soluta laboriosam hic minus! Error earum nam dolorum inventore quo.',
            'created_at' => now(),
            'updated_at' => now(),
        ],[
            'user_id' => 2,
            'fund_id' => 4,
            'comment' => 'Penggalangan ini butuh lebih banyak perhatian (gatau mau komen apa, lorem aja deh)             Lorem ipsum dolor sit amet consectetur adipisicing elit. Ducimus ex quis quae exercitationem quaerat blanditiis! Quo sint id reprehenderit voluptatum soluta laboriosam hic minus! Error earum nam dolorum inventore quo.',
            'created_at' => now(),
            'updated_at' => now(),
        ],[
            'user_id' => 1,
            'fund_id' => 5,
            'comment' => 'Penggalangan ini butuh lebih banyak perhatian (gatau mau komen apa, lorem aja deh)             Lorem ipsum dolor sit amet consectetur adipisicing elit. Ducimus ex quis quae exercitationem quaerat blanditiis! Quo sint id reprehenderit voluptatum soluta laboriosam hic minus! Error earum nam dolorum inventore quo.',
            'created_at' => now(),
            'updated_at' => now(),
        ],[
            'user_id' => 2,
            'fund_id' => 5,
            'comment' => 'Penggalangan ini butuh lebih banyak perhatian (gatau mau komen apa, lorem aja deh)             Lorem ipsum dolor sit amet consectetur adipisicing elit. Ducimus ex quis quae exercitationem quaerat blanditiis! Quo sint id reprehenderit voluptatum soluta laboriosam hic minus! Error earum nam dolorum inventore quo.',
            'created_at' => now(),
            'updated_at' => now(),
        ],[
            'user_id' => 2,
            'fund_id' => 6,
            'comment' => 'Penggalangan ini butuh lebih banyak perhatian (gatau mau komen apa, lorem aja deh)             Lorem ipsum dolor sit amet consectetur adipisicing elit. Ducimus ex quis quae exercitationem quaerat blanditiis! Quo sint id reprehenderit voluptatum soluta laboriosam hic minus! Error earum nam dolorum inventore quo.',
            'created_at' => now(),
            'updated_at' => now(),
        ],[
            'user_id' => 1,
            'fund_id' => 6,
            'comment' => 'Penggalangan ini butuh lebih banyak perhatian (gatau mau komen apa, lorem aja deh)             Lorem ipsum dolor sit amet consectetur adipisicing elit. Ducimus ex quis quae exercitationem quaerat blanditiis! Quo sint id reprehenderit voluptatum soluta laboriosam hic minus! Error earum nam dolorum inventore quo.',
            'created_at' => now(),
            'updated_at' => now(),
        ],[
            'user_id' => 2,
            'fund_id' => 7,
            'comment' => 'Penggalangan ini butuh lebih banyak perhatian (gatau mau komen apa, lorem aja deh)             Lorem ipsum dolor sit amet consectetur adipisicing elit. Ducimus ex quis quae exercitationem quaerat blanditiis! Quo sint id reprehenderit voluptatum soluta laboriosam hic minus! Error earum nam dolorum inventore quo.',
            'created_at' => now(),
            'updated_at' => now(),
        ],[
            'user_id' => 1,
            'fund_id' => 7,
            'comment' => 'Penggalangan ini butuh lebih banyak perhatian (gatau mau komen apa, lorem aja deh)             Lorem ipsum dolor sit amet consectetur adipisicing elit. Ducimus ex quis quae exercitationem quaerat blanditiis! Quo sint id reprehenderit voluptatum soluta laboriosam hic minus! Error earum nam dolorum inventore quo.',
            'created_at' => now(),
            'updated_at' => now(),
        ],[
            'user_id' => 2,
            'fund_id' => 8,
            'comment' => 'Penggalangan ini butuh lebih banyak perhatian (gatau mau komen apa, lorem aja deh)             Lorem ipsum dolor sit amet consectetur adipisicing elit. Ducimus ex quis quae exercitationem quaerat blanditiis! Quo sint id reprehenderit voluptatum soluta laboriosam hic minus! Error earum nam dolorum inventore quo.',
            'created_at' => now(),
            'updated_at' => now(),
        ],[
            'user_id' => 1,
            'fund_id' => 8,
            'comment' => 'Penggalangan ini butuh lebih banyak perhatian (gatau mau komen apa, lorem aja deh)             Lorem ipsum dolor sit amet consectetur adipisicing elit. Ducimus ex quis quae exercitationem quaerat blanditiis! Quo sint id reprehenderit voluptatum soluta laboriosam hic minus! Error earum nam dolorum inventore quo.',
            'created_at' => now(),
            'updated_at' => now(),
        ],[
            'user_id' => 2,
            'fund_id' => 9,
            'comment' => 'Penggalangan ini butuh lebih banyak perhatian (gatau mau komen apa, lorem aja deh)             Lorem ipsum dolor sit amet consectetur adipisicing elit. Ducimus ex quis quae exercitationem quaerat blanditiis! Quo sint id reprehenderit voluptatum soluta laboriosam hic minus! Error earum nam dolorum inventore quo.',
            'created_at' => now(),
            'updated_at' => now(),
        ],[
            'user_id' => 1,
            'fund_id' => 9,
            'comment' => 'Penggalangan ini butuh lebih banyak perhatian (gatau mau komen apa, lorem aja deh)             Lorem ipsum dolor sit amet consectetur adipisicing elit. Ducimus ex quis quae exercitationem quaerat blanditiis! Quo sint id reprehenderit voluptatum soluta laboriosam hic minus! Error earum nam dolorum inventore quo.',
            'created_at' => now(),
            'updated_at' => now(),
        ],[
            'user_id' => 1,
            'fund_id' => 10,
            'comment' => 'Penggalangan ini butuh lebih banyak perhatian (gatau mau komen apa, lorem aja deh)             Lorem ipsum dolor sit amet consectetur adipisicing elit. Ducimus ex quis quae exercitationem quaerat blanditiis! Quo sint id reprehenderit voluptatum soluta laboriosam hic minus! Error earum nam dolorum inventore quo.',
            'created_at' => now(),
            'updated_at' => now(),
        ],[
            'user_id' => 2,
            'fund_id' => 10,
            'comment' => 'Penggalangan ini butuh lebih banyak perhatian (gatau mau komen apa, lorem aja deh)             Lorem ipsum dolor sit amet consectetur adipisicing elit. Ducimus ex quis quae exercitationem quaerat blanditiis! Quo sint id reprehenderit voluptatum soluta laboriosam hic minus! Error earum nam dolorum inventore quo.',
            'created_at' => now(),
            'updated_at' => now(),
        ]]
    );
    }
}
