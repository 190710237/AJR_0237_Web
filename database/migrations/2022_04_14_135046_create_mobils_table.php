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
        Schema::create('mobils', function (Blueprint $table) {
            $table->id('id_mobil');
            $table->unsignedBigInteger('id_pemilik');
            $table->string('foto', 255);
            // $table->binary('foto');
            $table->string('nama_mobil', 16);
            $table->string('merk_mobil', 16);
            $table->string('tipe_mobil', 8);
            $table->string('jenis_transmisi', 4);
            $table->string('jenis_bahan_bakar', 8);
            $table->integer('volume_bahan_bakar');
            $table->string('warna_mobil', 8);
            $table->integer('kapasitas');
            $table->string('pelat_nomor', 10);
            $table->string('fasilitas', 64);
            $table->string('nomor_stnk', 32);
            $table->integer('harga_sewa');
            $table->boolean('kategori_aset');
            $table->date('tanggal_servis_terakhir');
            $table->date('periode_kontrak_mulai');
            $table->date('periode_kontrak_akhir');
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
        Schema::dropIfExists('mobils');
    }
};
