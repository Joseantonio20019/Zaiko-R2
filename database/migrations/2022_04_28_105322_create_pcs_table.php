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
        Schema::create('pcs', function (Blueprint $table) {
            $table->id('devices_id');
            $table->string('CPU')->nullable(false);
            $table->string('CPU Model')->nullable(false);
            $table->string('RAM Type')->nullable(false);
            $table->integer('RAM Size')->nullable(false);
            $table->string('OS')->nullable(false);
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
        Schema::dropIfExists('pcs');
    }
};
