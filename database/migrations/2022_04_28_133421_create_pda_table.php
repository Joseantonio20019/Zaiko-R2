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
        Schema::create('pda', function (Blueprint $table) {

            $table->id('devices_id');
            $table->macAddress('MAC')->nullable(false);
            $table->string('Serial Nº')->nullable(false);
            $table->timestamps();

            $table->foreign('devices_id')->references('id')->on('devices')->onUpdate('cascade')->onDelete('cascade');
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
