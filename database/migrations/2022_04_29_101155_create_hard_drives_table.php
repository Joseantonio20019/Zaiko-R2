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
        Schema::create('hard_drives', function (Blueprint $table) {
            $table->id();
            $table->integer('size')->nullable(false);
            $table->string('type')->nullable(false);
            $table->unsignedBigInteger('pc_id');
            $table->timestamps();

            $table->foreign('pc_id')->references('id')->on('computers')->onUpdate('cascade')->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('hard_drives');
    }
};
