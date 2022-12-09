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
        Schema::create('trn_booking', function (Blueprint $table) {
            $table->id();
            $table->bigInteger('id_user')->unsigned();
            $table->bigInteger('id_room')->unsigned();
            $table->date('tanggal');
            $table->string('keperluan');
            $table->string('kode_booking');
            $table->string('review')->nullable();
            $table->string('like')->nullable();
            $table->timestamps();
            $table->foreign('id_user')->references('id')->on('users')->onDelete('cascade')->onUpdate('cascade');
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
        Schema::dropIfExists('trn_booking');
    }
};
