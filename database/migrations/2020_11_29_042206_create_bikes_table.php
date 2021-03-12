<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateBikesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('bikes', function (Blueprint $table) {
            $table->increments('id');
            $table->string('uuid');
            $table->unsignedBigInteger('rider_id');
            $table->string('name');
            $table->string('dateOfPurchase');
            $table->string('placeOfPurchase');
            $table->string('cost');
            $table->string('brandingCost');
            $table->string('plateNumber')->unique();
            $table->string('accessoryBought');
            $table->string('arkRegDate')->nullable();
            $table->string('arkUpload')->nullable();
            $table->string('nipostRegDate')->nullable();
            $table->string('nipostUpload')->nullable();
            $table->string('lasaaRegDate')->nullable();
            $table->string('lasaaUpload')->nullable();
            $table->string('motRegDate')->nullable();
            $table->string('motUpload')->nullable();
            $table->string('licenseRegDate')->nullable();
            $table->string('licenseUpload')->nullable();
            $table->string('hackneyRegDate')->nullable();
            $table->string('hackneyUpload')->nullable();
            $table->string('lgaRegDate')->nullable();
            $table->string('lgaUpload')->nullable();
            $table->string('lagosRegDate')->nullable();
            $table->string('lagosUpload')->nullable();
            $table->string('ogunRegDate')->nullable();
            $table->string('ogunUpload')->nullable();

            $table->string('lasaaStickerRegDate')->nullable();
            $table->string('lasaaStickerRegDateUpload')->nullable();
            $table->string('freightRegDate')->nullable();
            $table->string('freightUpload')->nullable();
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
        Schema::dropIfExists('bikes');
    }
}
