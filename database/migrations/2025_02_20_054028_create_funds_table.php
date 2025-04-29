<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateFundsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('funds', function (Blueprint $table) {
            $table->id();
            $table->string('name');
            $table->text('description');
            $table->unsignedBigInteger('owner_id');
            $table->foreign('owner_id')->references('id')->on('users')->onDelete('cascade')->onUpdate('cascade');
            $table->unsignedBigInteger('category_id')->nullable();
            $table->foreign('category_id')->references('id')->on('categories')->onDelete('set null')->onUpdate('cascade');
            $table->bigInteger('currAmount');
            $table->bigInteger('targetAmount');
            $table->enum('approvalStatus', ['pending', 'approved', 'declined', 'finished'])->default('pending');
            $table->unsignedBigInteger('approvedOrDeclinedBy')->nullable();
            $table->foreign('approvedOrDeclinedBy')->references('id')->on('users')->onDelete('cascade')->onUpdate('cascade');
            $table->timestamps();
        });

        DB::table('funds')->insert([[
            'name' => 'Movie Fund',
            'description' => 'We are creating a movie.',
            'owner_id' => 1,
            'category_id' => 1,
            'currAmount' => 10000,
            'targetAmount' => 100000,
            'approvalStatus' => ['pending', 'approved', 'declined', 'finished'][rand(0, 3) % 4],
            'approvedOrDeclinedBy' => 1,
            'created_at' => now(),
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
            'created_at' => now(),
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
            'created_at' => now(),
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
            'created_at' => now(),
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
            'created_at' => now(),
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
            'created_at' => now(),
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
            'created_at' => now(),
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
            'created_at' => now(),
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
            'created_at' => now(),
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
        Schema::dropIfExists('funds');
    }
}
