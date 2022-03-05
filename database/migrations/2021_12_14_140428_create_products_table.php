<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateProductsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('products', function (Blueprint $table) {
            $table->increments('id');
            $table->string('title')->unique();
            $table->string('slug');
            $table->text('short_description')->nullable();
            $table->text('long_description')->nullable();
            $table->integer('brand_id');
            $table->integer('category_id');
            $table->integer('quantity')->default(5);
            $table->float('regular_price');
            $table->float('offer_price')->nullable();
            $table->tinyInteger('is_featured')->default(0)->comment('0=Inactive, 1=Active');
            $table->tinyInteger('status')->default(1)->comment('0=Inactive, 1=Active');
            $table->string('tags')->nullable();
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
        Schema::dropIfExists('products');
    }
}
