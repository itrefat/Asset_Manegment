<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateStoresTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('stores', function (Blueprint $table) {
            $table->id();
            $table->string('products_id');
            $table->string('model_no');
            $table->string('product_details');
            $table->string('product_sl_no')->nullable();
            $table->string('vendor')->nullable();
            $table->string('purchase_date')->nullable();
            $table->string('challan_no')->nullable();
            $table->string('picture')->default('default.jpg');
            $table->string('others')->nullable();
            $table->string('status')->nullable();
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
        Schema::dropIfExists('stores');
    }
}
