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
        Schema::table('reservasis', function (Blueprint $table) {
             $table->string('nama_pasien')->after('pasien_id');
            $table->date('tanggal_lahir')->after('nama_pasien');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::table('reservasis', function (Blueprint $table) {
            $table->dropColumn([
                'nama_pasien',
                'tanggal_lahir'
            ]);
        });
    }
};
