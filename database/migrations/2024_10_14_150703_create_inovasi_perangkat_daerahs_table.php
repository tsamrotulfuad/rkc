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
        Schema::create('inovasi_perangkat_daerahs', function (Blueprint $table) {
            $table->id();
            $table->string('nama');
            $table->string('tahapan');
            $table->string('inisiator');
            $table->string('nama_inisiator');
            $table->string('jenis');
            $table->string('bentuk');
            $table->string('tematik');
            $table->string('tematik_detail')->nullable();
            $table->string('urusan')->nullable();
            $table->date('waktu_ujicoba');
            $table->date('waktu_penerapan');
            $table->date('waktu_perkembangan')->nullable();
            $table->text('rancang_bangun');
            $table->text('tujuan');
            $table->text('manfaat');
            $table->text('hasil');
            $table->string('anggaran')->nullable();
            $table->string('profil_bisnis')->nullable();
            $table->string('doc_haki')->nullable();
            $table->string('penghargaan')->nullable();
            $table->year('tahun');
            $table->foreignId('user_id')->constrained('users');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('inovasi_perangkat_daerahs');
    }
};
