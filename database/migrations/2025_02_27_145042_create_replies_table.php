<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateRepliesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('replies', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('comments_id');
            $table->foreign('comments_id')->references('id')->on('comments')->onDelete('cascade')->onUpdate('cascade');
            $table->unsignedBigInteger('user_id')->nullable();
            $table->foreign('user_id')->references('id')->on('users')->onDelete('set null')->onUpdate('cascade');
            $table->text('replyText');
            $table->timestamps();
        });

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
        ]]);
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('replies');
    }
}
