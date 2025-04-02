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
            'comment' => 'This is a comment from user 1 to fund 1',
            'created_at' => now(),
            'updated_at' => now(),
        ],[
            'user_id' => 2,
            'fund_id' => 1,
            'comment' => 'This is a comment from user 2 to fund 1',
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
        Schema::dropIfExists('comments');
    }
}
