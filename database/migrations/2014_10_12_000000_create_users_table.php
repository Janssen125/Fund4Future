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
            $table->string('nohp')->nullable();
            $table->enum('jk', ['pria', 'wanita'])->default('pria')->nullable();
            $table->date('dob');
            $table->enum('role', ['admin', 'user', 'staff'])->default('user');
            $table->bigInteger('balance')->default(0);
            $table->string('userImg')->nullable();
            $table->bigInteger('nik')->nullable();
            $table->string('ktpImg')->nullable();
            $table->rememberToken();
            $table->timestamps();
        });
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
