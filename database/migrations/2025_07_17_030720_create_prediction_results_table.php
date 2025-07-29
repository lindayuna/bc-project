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
        Schema::create('prediction_results', function (Blueprint $table) {
            $table->id();
            $table->foreignId('prediction_id')->constrained('predictions')->onDelete('cascade');
            $table->string('prediction')->nullable(); // 'breast cancer' or 'normal'
            $table->decimal('accuracy', 10, 8)->nullable(); // Perbesar precision untuk accuracy
            $table->decimal('confidence_score', 15, 10)->nullable(); // Perbesar precision untuk confidence score yang besar
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('prediction_results');
    }
};