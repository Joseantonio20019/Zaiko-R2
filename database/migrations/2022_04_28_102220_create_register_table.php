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
        Schema::create('registers', function (Blueprint $table) {
            $table->id()->unique()->autoIncrement();
            $table->string('user')->nullable(false);
            $table->string('comment')->nullable(false);
            $table->timestamps();
            $table->unsignedBigInteger('devices_id');

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
        Schema::dropIfExists('registers');
    }
};
