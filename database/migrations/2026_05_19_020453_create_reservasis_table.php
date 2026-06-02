<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::create('reservasis', function (Blueprint $table) {

            $table->id();

            $table->unsignedBigInteger('pasien_id');

            $table->unsignedBigInteger('dokter_id');

            $table->unsignedBigInteger('layanan_id');

            $table->date('tanggal_reservasi');

            $table->time('jam_reservasi');

            $table->text('keluhan');

            $table->enum('status', [
                'pending',
                'diterima',
                'selesai',
                'batal'
            ])->default('pending');

            $table->timestamps();

            $table->foreign('pasien_id')
                  ->references('id')
                  ->on('pasiens')
                  ->onDelete('cascade');

            $table->foreign('dokter_id')
                  ->references('id')
                  ->on('dokters')
                  ->onDelete('cascade');

            $table->foreign('layanan_id')
                  ->references('id')
                  ->on('layanans')
                  ->onDelete('cascade');
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('reservasis');
    }
};