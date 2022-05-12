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
        Schema::create('computers', function (Blueprint $table) {
            $table->bigInteger('device_id')->unsigned()->unique();
            $table->string('cpu')->nullable(false);
            $table->string('cpu_model')->nullable(false);
            $table->string('ram_type')->nullable(false);
            $table->integer('ram_size')->nullable(false);
            $table->string('os')->nullable(false);
            $table->timestamps();

            $table->foreign('device_id')->references('id')->on('devices')->onUpdate('cascade')->onDelete('cascade'); 
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
