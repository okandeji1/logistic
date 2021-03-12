<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateAccidentsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('accidents', function (Blueprint $table) {
            $table->increments('id');
            $table->string('uuid');
            $table->unsignedBigInteger('user_id');
            $table->unsignedBigInteger('rider_id');
            $table->string('dateOfAccident');
            $table->string('placeOfAccident');
            $table->string('timeOfAccident');
            $table->text('descriptionOfBike');
            $table->text('descriptionOfRider');
            $table->string('dateOfRepair');
            $table->string('costOfRepair');
            $table->string('mechanicName');
            $table->string('mechanicNumber');
            $table->text('mechanicShopAddress');
            $table->text('insuranceClaim')->nullable();
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
        Schema::dropIfExists('accidents');
    }
}
