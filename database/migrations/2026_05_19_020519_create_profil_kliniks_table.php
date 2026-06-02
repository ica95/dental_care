<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::create('profil_kliniks', function (Blueprint $table) {

            $table->id();

            $table->string('nama_klinik');

            $table->text('alamat');

            $table->string('no_hp');

            $table->string('email');

            $table->text('deskripsi');

            $table->string('logo')->nullable();

            $table->timestamps();
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('profil_kliniks');
    }
};