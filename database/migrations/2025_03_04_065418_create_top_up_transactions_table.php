<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateTopUpTransactionsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('top_up_transactions', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('user_id');
            $table->foreign('user_id')->references('id')->on('users')->onDelete('cascade');
            $table->string('order_id')->unique();
            $table->decimal('gross_amount', 10, 2);
            $table->string('status')->default('pending');
            $table->string('status_code');
            $table->string('transaction_id')->nullable();
            $table->string('fraud_status')->nullable();
            $table->string('payment_type');
            $table->timestamp('transaction_time')->nullable();
            $table->string('signature_key')->nullable();
            $table->string('finish_redirect_url')->nullable();
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
        Schema::dropIfExists('top_up_transactions');
    }
}
