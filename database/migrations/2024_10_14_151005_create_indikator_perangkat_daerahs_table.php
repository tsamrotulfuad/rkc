<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::create('indikator_perangkat_daerahs', function (Blueprint $table) {
            $table->id();
            $table->string('regulasi');
            $table->string('regulasi_upload');
            $table->string('ketersediaan_sdm');
            $table->string('ketersediaan_sdm_upload');
            $table->string('dukungan_anggaran');
            $table->string('dukungan_anggaran_upload');
            $table->string('kecepatan_penciptaan');
            $table->string('kecepatan_penciptaan_upload');
            $table->string('kemanfaatan_do');
            $table->string('kemanfaatan_parameter');
            $table->string('kemanfaatan_upload');
            $table->string('sosialisasi');
            $table->string('sosialisasi_upload');
            $table->string('kemudahan_proses');
            $table->string('kemudahan_proses_upload');
            $table->string('alat_kerja');
            $table->string('alat_kerja_upload');
            $table->string('kualitas');
            $table->foreignId('inovasi_perangkat_daerah_id')->constrained('inovasi_perangkat_daerahs');
            $table->foreignId('user_id')->constrained('users');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('indikator_perangkat_daerahs');
    }
};
