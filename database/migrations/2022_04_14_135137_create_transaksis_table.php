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
        Schema::create('transaksis', function (Blueprint $table) {
            $table->id('id_transaksi');
            $table->unsignedBigInteger('id_promo')->nullable();
            $table->foreign('id_promo')
                ->references('id_promo')
                ->on('promos');
            $table->unsignedBigInteger('id_mobil');
            $table->foreign('id_mobil')
                ->references('id_mobil')
                ->on('mobils');
            $table->unsignedBigInteger('id_driver')->nullable();
            $table->foreign('id_driver')
                ->references('id_driver')
                ->on('drivers');
            $table->unsignedBigInteger('id_pegawai')->nullable();
            $table->foreign('id_pegawai')
                ->references('id_pegawai')
                ->on('pegawais');
            $table->unsignedBigInteger('id_customer');
            $table->foreign('id_customer')
                ->references('id_customer')
                ->on('customers');
            $table->string('status_transaksi', 32);
            $table->integer('diskon');
            $table->integer('biaya_denda');
            $table->integer('biaya_sub_total');
            $table->integer('biaya_total');
            $table->string('metode_pembayaran', 32);
            $table->string('bukti_pembayaran', 255);
            // $table->binary('bukti_pembayaran');
            $table->date('tanggal_transaksi');
            $table->dateTime('tanggal_waktu_mulai_sewa');
            $table->dateTime('tanggal_waktu_akhir_sewa');
            $table->dateTime('tanggal_waktu_pengembalian_mobil');
            $table->integer('rating_driver');
            $table->integer('rating_ajr');
            $table->string('komentar_driver', 255);
            $table->string('komentar_ajr', 255);
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
        Schema::dropIfExists('transaksis');
    }
};
