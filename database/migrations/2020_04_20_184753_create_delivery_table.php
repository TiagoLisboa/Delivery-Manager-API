<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateDeliveryTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('delivery', function (Blueprint $table) {
            $table->id();
            $table->string('delivery');
            $table->foreignId('receiver_id')->onDelete('cascade');
            $table->foreignId('carrier_id')->onDelete('cascade');
            $table->foreignId('delivery_address_id')->onDelete('cascade');
            $table->foreignId('pickup_address_id')->onDelete('cascade');
            $table->dateTime('delivery_term');
            $table->timestamps();

            $table->foreign('receiver_id')->references('id')->on('users');
            $table->foreign('carrier_id')->references('id')->on('users');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('delivery');
    }
}
