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
        Schema::create('imeis', function (Blueprint $table) {
            $table->unsignedBigInteger('pda_id')->index();
            $table->foreign('pda_id')->references('devices_id')->on('pdas')->onUpdate('cascade')->onDelete('cascade');
            $table->unsignedBigInteger('phones_id')->index();
            $table->foreign('phones_id')->references('devices_id')->on('phones')->onUpdate('cascade')->onDelete('cascade');
            $table->integer('IMEI')->nullable(false);
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
        Schema::dropIfExists('imeis');
    }
};
