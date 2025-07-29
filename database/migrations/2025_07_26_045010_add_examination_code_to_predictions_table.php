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
        Schema::table('predictions', function (Blueprint $table) {
            // Check if column doesn't exist before adding
            if (!Schema::hasColumn('predictions', 'examination_code')) {
                $table->string('examination_code', 15)->nullable()->after('user_id')
                      ->comment('Kode unik untuk setiap pemeriksaan');
            }
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::table('predictions', function (Blueprint $table) {
            if (Schema::hasColumn('predictions', 'examination_code')) {
                $table->dropColumn('examination_code');
            }
        });
    }
};