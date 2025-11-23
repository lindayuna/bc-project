<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up()
    {
        Schema::table('predictions', function (Blueprint $table) {
            $table->json('faktor_risiko_list')->nullable()->after('faktor_risiko');
        });
    }

    public function down()
    {
        Schema::table('predictions', function (Blueprint $table) {
            $table->dropColumn('faktor_risiko_list');
        });
    }
};