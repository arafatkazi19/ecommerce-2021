<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateOrdersTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('orders', function (Blueprint $table) {
            $table->increments('id');
            $table->unsignedBigInteger('user_id')->nullable();
            $table->string('ip_address')->nullable();
            $table->string('first_name');
            $table->string('last_name');
            $table->string('phone');
            $table->string('email');
            $table->string('address');
            $table->integer('district_id');
            $table->integer('division_id');
            $table->string('country');
            $table->text('message')->nullable();
            $table->integer('amount');
            $table->string('transaction_id')->nullable();
            $table->string('currency')->nullable();
            $table->integer('is_paid')->default(0)->comment('0 = COD, 1 = SSL');
            $table->integer('status')->default(0)->comment('0 = processing, 1 = hold, 2  = successful, 3 = canceled');
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
        Schema::dropIfExists('orders');
    }
}
