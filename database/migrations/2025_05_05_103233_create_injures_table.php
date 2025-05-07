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
        Schema::create('injures', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('account_id')->index();
            $table->integer('player_id')->nullable()->index();
            $table->integer('playeraction_id')->index()->nullable();
            $table->integer('pathologytype_id')->index()->nullable();
            $table->integer('bodyarea_id')->index()->nullable();
            $table->integer('osiiscode_id')->index()->nullable();
            $table->date('date_event')->nullable();
            $table->string('problem_type', 25)->nullable();
            $table->string('onset', 150)->nullable();
            $table->string('when_occurred', 50)->nullable();
            $table->integer('fixture_minute')->nullable();
            $table->string('contact', 50)->nullable();
            $table->string('contact_type', 150)->nullable();
            $table->string('subsequent_cat', 150)->nullable();
            $table->integer('time_loss')->nullable();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('injures');
    }
};
