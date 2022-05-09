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
            $table->id();
            $table->enum('manageable',['YES','NO','UNIFY'])->nullable(false);
            $table->enum('POE',['NO','24','48','24&48'])->nullable(false);
            $table->enum('Speed',['100MB','1GB','2.5GB','5GB','10GB'])->nullable(false);
            $table->integer('ethernet_ports_number')->nullable(false);
            $table->integer('fiber_ports_number')->nullable(false);

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
        Schema::dropIfExists('network_devices');
    }
};
