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
        Schema::create('pemilik_mobils', function (Blueprint $table) {
            $table->id('id_pemilik');
            $table->string('nama', 64);
            $table->string('alamat', 255);
            $table->string('nomor_telepon', 16);
            $table->string('nomor_ktp', 32);
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
        Schema::dropIfExists('pemilik_mobils');
    }
};
