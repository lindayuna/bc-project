<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;
use Illuminate\Support\Facades\DB;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::table('users', function (Blueprint $table) {
            // Mengubah default value kolom role dari 'dokter' menjadi 'user'
            $table->string('role')->default('user')->change();
        });
        
        // Update existing records yang memiliki role 'dokter' menjadi 'user' (opsional)
        // Uncomment baris di bawah jika ingin mengubah data yang sudah ada
        // DB::table('users')->where('role', 'dokter')->update(['role' => 'user']);
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::table('users', function (Blueprint $table) {
            // Kembalikan default value ke 'dokter'
            $table->string('role')->default('dokter')->change();
        });
    }
};