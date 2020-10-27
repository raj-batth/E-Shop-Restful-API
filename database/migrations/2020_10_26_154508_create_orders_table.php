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
            $table->id();
            $table->foreignId('user_id')->unsigned();
            $table->foreignId('product_id')->unsigned();
            $table->json('shipping_address'); //! Todo Need to store  {address, city, postalCode, country}
            $table->string('payment_method');
            $table->json('payment_result'); //! Todo {id, status, update_time, emailAddress}
            $table->integer('tax_price')->default(0.0);
            $table->integer('shipping_price')->default(0.0);
            $table->integer('total_price')->default(0.0);
            $table->boolean('is_paid')->default(false);
            $table->dateTime('paid_at');
            $table->boolean('is_delivered')->default(false);
            $table->dateTime('delivered_at');
            $table->foreign('user_id')->references('id')->on('users');
            $table->foreign('product_id')->references('id')->on('products');
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
