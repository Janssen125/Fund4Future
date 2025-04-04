<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateCommentsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('comments', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('user_id')->nullable();
            $table->foreign('user_id')->references('id')->on('users')->onDelete('set null')->onUpdate('cascade');
            $table->unsignedBigInteger('fund_id');
            $table->foreign('fund_id')->references('id')->on('funds')->onDelete('cascade')->onUpdate('cascade');
            $table->text('comment');
            $table->timestamps();
        });

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

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('comments');
    }
}
