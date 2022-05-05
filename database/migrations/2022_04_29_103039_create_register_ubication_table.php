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
            $table->unsignedBigInteger('ubication_id')->index();
            $table->foreign('ubication_id')->references('id')->on('ubications')->onUpdate('restrict')->onDelete('restrict');
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
        Schema::dropIfExists('register_ubication');
    }
};
