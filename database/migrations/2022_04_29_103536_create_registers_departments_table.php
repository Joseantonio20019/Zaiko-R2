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
        Schema::create('registers_departments', function (Blueprint $table) {
            $table->unsignedBigInteger('register_id')->index();
            $table->foreign('register_id')->references('id')->on('registers')->onUpdate('restrict')->onDelete('restrict');
            $table->unsignedBigInteger('departments_id')->index();
            $table->foreign('departments_id')->references('id')->on('departments')->onUpdate('restrict')->onDelete('restrict');
            $table->dateTime('ModificationDate')->nullable(false);
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
