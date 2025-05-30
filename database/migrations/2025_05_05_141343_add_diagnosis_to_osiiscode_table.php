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
        Schema::table('osiiscode', function (Blueprint $table) {
            $table->string('diagnosis')->nullable()->after('Abr');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::table('osiiscode', function (Blueprint $table) {
            $table->dropColumn('diagnosis');
        });
    }
};
