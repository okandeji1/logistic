<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateIncompleteOrdersTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('incomplete_orders', function (Blueprint $table) {
            $table->increments('id');
            $table->string('uuid');
            $table->unsignedBigInteger('customer_id')->nullable();
            $table->unsignedBigInteger('category_id')->nullable();
            $table->unsignedBigInteger('user_id')->nullable();
            $table->string('pickupRegion');
            $table->string('pickupAddress');
            $table->string('deliveryRegion');
            $table->string('deliveryAddress');
            $table->string('deliveryContactName');
            $table->string('deliveryContactPhone');
            $table->integer('estimatedAmount')->default(0);
            $table->integer('amountPaid')->default(0);
            $table->string('paymentType');
            $table->string('trackingId');
            $table->string('reference');
            $table->string('is_complete')->default(0);
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
        Schema::dropIfExists('incomplete_orders');
    }
}