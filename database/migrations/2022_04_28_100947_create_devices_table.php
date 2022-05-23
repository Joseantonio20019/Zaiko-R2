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
            $table->string('inventory_number')->nullable(false);
            $table->text('comment')->nullable(true);
            $table->string('model')->nullable(false);
            $table->string('family')->nullable(false);
            $table->string('status')->nullable(false);
            $table->string('mark')->nullable(false);
            $table->string('site')->nullable(false);
            $table->string('ubication')->nullable(false);
            $table->string('department')->nullable(false);
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
        Schema::dropIfExists('devices');
    }
};
