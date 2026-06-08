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
        if (!Schema::hasColumn('rekam_medis', 'biaya'))
        {
            Schema::table('rekam_medis', function (Blueprint $table) {

                $table->bigInteger('biaya')
                      ->default(0);

            });
        }
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        if (Schema::hasColumn('rekam_medis', 'biaya'))
        {
            Schema::table('rekam_medis', function (Blueprint $table) {

                $table->dropColumn('biaya');

            });
        }
    }
};