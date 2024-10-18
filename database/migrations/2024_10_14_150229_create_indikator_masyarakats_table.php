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
        Schema::create('indikator_masyarakats', function (Blueprint $table) {
            $table->id();
            $table->text('kemudahan_proses');
            $table->text('keterlibatan_aktor');
            $table->string('sosialisasi');
            $table->string('sosialisasi_upload');
            $table->text('kemanfaatan');
            $table->string('kemanfaatan_upload');
            $table->string('kualitas');
            $table->foreignId('inovasi_masyarakat_id')->constrained('inovasi_masyarakats');
            $table->foreignId('user_id')->constrained('users');
            $table->timestamps();
            
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('indikator_masyarakats');
    }
};
