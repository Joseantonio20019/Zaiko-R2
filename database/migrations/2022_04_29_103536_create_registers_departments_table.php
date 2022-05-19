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
        Schema::create('register_departments', function (Blueprint $table) {
            $table->unsignedBigInteger('register_id')->index();
            $table->foreign('register_id')->references('id')->on('registers')->onUpdate('cascade')->onDelete('cascade');
            $table->unsignedBigInteger('departments_id')->index();
            $table->foreign('departments_id')->references('id')->on('departments')->onUpdate('cascade')->onDelete('cascade');
            $table->dateTime('modification_date')->nullable(false);
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
        Schema::dropIfExists('registers_departments');
    }
};
