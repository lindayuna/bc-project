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
        Schema::table('doctors', function (Blueprint $table) {
            // Hapus kolom address jika ada (karena address ada di users table)
            if (Schema::hasColumn('doctors', 'address')) {
                $table->dropColumn('address');
            }
            
            // Tambahkan kolom professional baru dengan check
            if (!Schema::hasColumn('doctors', 'specialization')) {
                $table->string('specialization')->nullable()->after('gender');
            }
            
            if (!Schema::hasColumn('doctors', 'str_number')) {
                $table->string('str_number', 100)->nullable()->after('specialization');
            }
            
            if (!Schema::hasColumn('doctors', 'education_history')) {
                $table->text('education_history')->nullable()->after('str_number');
            }
            
            if (!Schema::hasColumn('doctors', 'practice_location')) {
                $table->string('practice_location')->nullable()->after('education_history');
            }
            
            if (!Schema::hasColumn('doctors', 'practice_schedule')) {
                $table->json('practice_schedule')->nullable()->after('practice_location');
            }
            
            // Update gender column type to avoid truncation
            if (Schema::hasColumn('doctors', 'gender')) {
                $table->string('gender', 10)->nullable()->change();
            }
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::table('doctors', function (Blueprint $table) {
            // Kembalikan kolom address
            $table->text('address')->nullable()->after('gender');
            
            // Hapus kolom yang ditambahkan
            $columns = ['specialization', 'str_number', 'education_history', 'practice_location', 'practice_schedule'];
            
            foreach ($columns as $column) {
                if (Schema::hasColumn('doctors', $column)) {
                    $table->dropColumn($column);
                }
            }
        });
    }
};