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
        Schema::create('devices', function (Blueprint $table) {
            $table->id()->unique()->autoIncrement();
            $table->integer('Inventory Nº')->nullable(false);
            $table->text('Comment')->nullable(false);
            $table->string('Model')->nullable(false);
            $table->string('Type')->nullable(false);
            $table->string('Status')->nullable(false);
            $table->unsignedBigInteger('mark_id');
            $table->timestamps();

            $table->foreign('mark_id')->references('id')->on('mark')->onUpdate('cascade')->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('devices');
    }
};
