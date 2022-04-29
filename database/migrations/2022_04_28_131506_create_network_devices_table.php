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
        Schema::create('network_devices', function (Blueprint $table) {
            $table->id('devices_id');
            $table->enum('manageable',['YES','NO','UNIFY'])->nullable(false);
            $table->enum('POE',['NO','24','48','24&48'])->nullable(false);
            $table->enum('Speed',['100MB','1GB','2.5GB','5GB','10GB'])->nullable(false);
            $table->integer('Ethernet Ports Nº')->nullable(false);
            $table->integer('Fiber Ports Nº')->nullable(false);

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
        Schema::dropIfExists('network_devices');
    }
};
