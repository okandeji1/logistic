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
            $table->string('uuid');
            $table->unsignedBigInteger('customer_id')->nullable();
            $table->unsignedBigInteger('user_id')->nullable();
            $table->unsignedBigInteger('rider_id')->nullable();
            $table->unsignedBigInteger('category_id');
            $table->string('customerEmail')->nullable();
            $table->string('customerPhone');
            $table->string('orderCategory');
            $table->string('pickupRegion');
            $table->string('pickupAddress');
            $table->string('deliveryRegion');
            $table->string('deliveryAddress');
            $table->string('deliveryContactName');
            $table->string('deliveryContactPhone');
            $table->integer('estimatedAmount')->default(0);
            $table->integer('amountPaid')->default(0);
            $table->string('status')->default('Pending');
            $table->string('paymentType');
            $table->string('trackingId');
            $table->tinyInteger('is_paid')->default(0);
            $table->timestamps();
            $table->softDeletes();
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