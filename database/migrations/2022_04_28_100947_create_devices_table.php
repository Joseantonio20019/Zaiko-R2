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
            $table->integer('inventory_number')->nullable(false);
            $table->text('comment')->nullable(false);
            $table->string('model')->nullable(false);
            $table->string('type')->nullable(false);
            $table->string('status')->nullable(false);
            $table->unsignedBigInteger('mark_id');
            $table->timestamps();

            $table->foreign('mark_id')->references('id')->on('marks')->onUpdate('cascade')->onDelete('cascade');
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
