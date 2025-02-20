<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateFundDetailsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('fund_details', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('fund_id');
            $table->foreign('fund_id')->references('id')->on('funds')->onDelete('cascade')->onUpdate('cascade');
            $table->enum('types', ['image', 'video'])->default('image');
            $table->string('imageOrVideo');
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
        Schema::dropIfExists('fund_details');
    }
}
