<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateCategoriesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('categories', function (Blueprint $table) {
            $table->id();
            $table->string("catName");
            $table->timestamps();
        });

        DB::table('categories')->insert([[
            'catName' => 'Movie',
            'created_at' => now(),
            'updated_at' => now(),
        ],[
            'catName' => 'Games',
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
        Schema::dropIfExists('categories');
    }
}
