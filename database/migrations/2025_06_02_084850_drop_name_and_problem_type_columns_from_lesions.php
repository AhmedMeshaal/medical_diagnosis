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
        Schema::table('lesions', function (Blueprint $table) {
            $table->dropColumn('name');
        });
        Schema::table('lesions', function (Blueprint $table) {
            $table->dropColumn('problem_type');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::table('lesions', function (Blueprint $table) {
            $table->string('name');
        });
        Schema::table('lesions', function (Blueprint $table) {
            $table->string('problem_type');
        });
    }
};
