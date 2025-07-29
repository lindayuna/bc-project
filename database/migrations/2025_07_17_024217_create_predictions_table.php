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
        Schema::create('predictions', function (Blueprint $table) {
            $table->id();
            $table->foreignId('user_id')->constrained()->onDelete('cascade');
            $table->enum('faktor_risiko', ['ya', 'tidak']);
            $table->enum('benjolan_di_payudara', ['ya', 'tidak']);
            $table->enum('kecepatan_tumbuh', ['ya', 'tidak']);
            $table->enum('nipple_discharge', ['ya', 'tidak']);
            $table->enum('retraksi_putting_susu', ['ya', 'tidak']);
            $table->enum('krusta', ['ya', 'tidak']);
            $table->enum('dimpling', ['ya', 'tidak']);
            $table->enum('peau_dorange', ['ya', 'tidak']);
            $table->enum('ulserasi', ['ya', 'tidak']);
            $table->enum('venektasi', ['ya', 'tidak']);
            $table->enum('benjolan_ketiak', ['ya', 'tidak']);
            $table->enum('edema_lengan', ['ya', 'tidak']);
            $table->enum('nyeri_tulang', ['ya', 'tidak']);
            $table->enum('sesak', ['ya', 'tidak']);
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('predictions');
    }
};
