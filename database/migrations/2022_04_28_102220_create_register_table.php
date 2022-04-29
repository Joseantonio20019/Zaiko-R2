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
        Schema::create('register', function (Blueprint $table) {
            $table->id()->unique()->autoIncrement();
            $table->string('User')->nullable(false);
            $table->string('Comment')->nullable(false);
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
        Schema::dropIfExists('register');
    }
};
