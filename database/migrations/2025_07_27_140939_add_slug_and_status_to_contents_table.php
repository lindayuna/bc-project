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
        Schema::table('contents', function (Blueprint $table) {
            // Add slug column
            $table->string('slug')->unique()->nullable()->after('title');
            
            // Add status column
            $table->enum('status', ['draft', 'published', 'archived'])
                  ->default('published')
                  ->after('body');
                  
            // Add views counter (optional)
            $table->unsignedInteger('views')->default(0)->after('status');
            
            // Add index for better performance
            $table->index(['category', 'status']);
            $table->index(['status', 'created_at']);
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::table('contents', function (Blueprint $table) {
            // Drop indexes first
            $table->dropIndex(['category', 'status']);
            $table->dropIndex(['status', 'created_at']);
            
            // Drop columns
            $table->dropColumn(['slug', 'status', 'views']);
        });
    }
};