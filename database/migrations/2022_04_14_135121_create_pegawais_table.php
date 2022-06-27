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
        Schema::create('pegawais', function (Blueprint $table) {
            $table->id('id_pegawai');
            $table->unsignedBigInteger('id_role');
            $table->foreign('id_role')
                ->references('id_role')
                ->on('roles');
            $table->string('email', 32);
            // $table->string('password', 255);
            // $table->string('nama', 64);
            $table->string('alamat', 255);
            $table->date('tanggal_lahir');
            $table->boolean('jenis_kelamin');
            $table->string('foto', 255);
            // $table->binary('foto');
            $table->string('nomor_telepon', 16);
            $table->string('nomor_ktp', 32);
            // $table->rememberToken();
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
        Schema::dropIfExists('pegawais');
    }
};
