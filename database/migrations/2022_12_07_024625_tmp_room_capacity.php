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
        Schema::create('tmp_room_capacity', function (Blueprint $table) {
            $table->id();
            $table->bigInteger('id_room')->unsigned();
            $table->date('tanggal');
            $table->integer('kapasitas');
            $table->timestamps();
            $table->foreign('id_room')->references('id')->on('mst_room')->onDelete('cascade')->onUpdate('cascade');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('tmp_room_capacity');
    }
};
