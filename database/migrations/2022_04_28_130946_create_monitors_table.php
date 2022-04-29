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
        Schema::create('monitors', function (Blueprint $table) {
            $table->id('devices_id');
            $table->integer('inches')->nullable(false);
            $table->boolean('HDMI')->nullable(false);
            $table->boolean('VGA')->nullable(false);
            $table->boolean('DVI')->nullable(false);
            $table->boolean('DisplayPort')->nullable(false);
            $table->timestamps();

            $table->foreign('devices_id')->references('id')->on('devices');


        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('monitors');
    }
};
