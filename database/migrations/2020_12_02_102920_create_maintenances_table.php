<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateMaintenancesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('maintenances', function (Blueprint $table) {
            $table->increments('id');
            $table->string('uuid');
            $table->unsignedBigInteger('user_id');
            $table->unsignedBigInteger('bike_id');
            $table->string('dateOfService');
            $table->string('bikeAccessoryOne')->nullable();
            $table->string('bikeAccessoryTwo')->nullable();
            $table->string('bikeAccessoryTwo')->nullable();
            $table->string('mechanicName');
            $table->string('costOfService');
            $table->text('description');
            $table->string('insuranceClaim')->nullable();
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
        Schema::dropIfExists('maintenances');
    }
}
