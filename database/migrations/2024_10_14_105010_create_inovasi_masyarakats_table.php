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
        Schema::create('inovasi_masyarakats', function (Blueprint $table) {
            $table->id();
            $table->string('nama');
            $table->string('nama_inisiator');
            $table->string('no_hp');
            $table->string('ktp');
            $table->string('bentuk');
            $table->string('tahapan');
            $table->string('jenis');
            $table->date('waktu_ujicoba');
            $table->date('waktu_penerapan');
            $table->text('rancang_bangun');
            $table->text('tujuan');
            $table->text('manfaat');
            $table->text('hasil');
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
        Schema::dropIfExists('inovasi_masyarakats');
    }
};
