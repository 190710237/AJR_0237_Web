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
        Schema::create('drivers', function (Blueprint $table) {
            $table->id('id_driver')->nullable();
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
            $table->boolean('bahasa');
            $table->string('status_driver', 32);
            $table->integer('tarif_driver');
            $table->string('fc_sim', 255);
            $table->string('fc_bebas_napza', 255);
            $table->string('fc_kesehatan_jiwa', 255);
            $table->string('fc_kesehatan_jasmani', 255);
            $table->string('fc_skck', 255);
            // $table->binary('fc_sim');
            // $table->binary('fc_bebas_napza');
            // $table->binary('fc_kesehatan_jiwa');
            // $table->binary('fc_kesehatan_jasmani');
            // $table->binary('fc_skck');
            $table->float('rerata_rating');
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
        Schema::dropIfExists('drivers');
    }
};
