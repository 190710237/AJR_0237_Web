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
        Schema::create('customers', function (Blueprint $table) {
            $table->id('id_customer');
            $table->string('id_kartu', 13);
            $table->string('email', 32)->unique();
            // $table->string('password', 255);
            // $table->string('nama', 64);
            $table->string('alamat', 255);
            $table->date('tanggal_lahir');
            $table->boolean('jenis_kelamin');
            $table->string('foto', 255)->nullable();
            // $table->binary('foto');
            $table->string('nomor_telepon', 16);
            $table->string('nomor_ktp', 32)->nullable();
            $table->string('nomor_sim', 32)->nullable();
            $table->boolean('verifikasi');
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
        Schema::dropIfExists('customers');
    }
};
