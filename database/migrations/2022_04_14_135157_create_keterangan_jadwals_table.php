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
        Schema::create('keterangan_jadwals', function (Blueprint $table) {
            $table->unsignedBigInteger('id_pegawai');
            $table->foreign('id_pegawai')
                ->references('id_pegawai')
                ->on('pegawais')
                ->onDelete('cascade');
            $table->unsignedBigInteger('id_jadwal');
            $table->foreign('id_jadwal')
                ->references('id_jadwal')
                ->on('jadwals')
                ->onDelete('cascade');
            // $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('keterangan_jadwals');
    }
};
