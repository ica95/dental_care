<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::create('rekam_medis', function (Blueprint $table) {

            $table->id();

            $table->unsignedBigInteger('reservasi_id');
            $table->unsignedBigInteger('pasien_id');
            $table->unsignedBigInteger('dokter_id');

            $table->date('tanggal_periksa');
            $table->text('diagnosa');
            $table->text('tindakan');
            $table->text('resep_obat')->nullable();
            $table->text('catatan')->nullable();

            $table->timestamps();

            // FOREIGN KEY

            $table->foreign('reservasi_id')
                  ->references('id')
                  ->on('reservasis')
                  ->onDelete('cascade');

            $table->foreign('pasien_id')
                  ->references('id')
                  ->on('pasiens')
                  ->onDelete('restrict');

            $table->foreign('dokter_id')
                  ->references('id')
                  ->on('dokters')
                  ->onDelete('restrict');
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('rekam_medis');
    }
};