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
        Schema::create('register_ubications', function (Blueprint $table) {
            $table->unsignedBigInteger('register_id')->index();
            $table->foreign('register_id')->references('id')->on('registers')->onUpdate('restrict')->onDelete('restrict');
            $table->unsignedBigInteger('ubications_id')->index();
            $table->foreign('ubications_id')->references('id')->on('ubications')->onUpdate('restrict')->onDelete('restrict');
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
        Schema::dropIfExists('registers_ubications');
    }
};
