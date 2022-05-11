<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('pdas', function (Blueprint $table) {

            $table->id();
            $table->macAddress('MAC')->nullable(false);
            $table->string('serial_number')->nullable(false);
            $table->string('imei')->nullable(false);
            $table->timestamps();

            $table->foreign('id')->references('id')->on('devices')->onUpdate('cascade')->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('pda');
    }
};
