<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateUsersTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('users', function (Blueprint $table) {
            $table->id();
            $table->string('name');
            $table->string('email')->unique();
            $table->timestamp('email_verified_at')->nullable();
            $table->string('password');
            $table->date('dob');
            $table->enum('role', ['admin', 'user', 'staff'])->default('user');
            $table->bigInteger('balance')->default(0);
            $table->bigInteger('nik')->nullable();
            $table->string('ktpImg')->nullable();
            $table->rememberToken();
            $table->timestamps();
        });

        DB::table('users')->insert([[
            'name' => 'admin',
            'email' => 'admin@gmail.com',
            'email_verified_at' => now(),
            'password' => Hash::make('admin123'),
            'dob' => '2001-01-01',
            'role' => 'admin',
            'balance' => 1000000,
            'created_at' => now(),
            'updated_at' => now(),
        ],[
            'name' => 'user',
            'email' => 'user@gmail.com',
            'email_verified_at' => now(),
            'password' => Hash::make('user123'),
            'dob' => '2001-01-01',
            'role' => 'user',
            'balance' => 1000000,
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
        Schema::dropIfExists('users');
    }
}
