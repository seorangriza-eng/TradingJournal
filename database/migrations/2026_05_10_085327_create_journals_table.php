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
        Schema::create('journals', function (Blueprint $table) {
            $table->id();
            $table->foreignId('pair_id')->nullable()->constrained()->nullOnDelete();
            $table->string('daily_candle_c', 5); // C2, C3, C4, Pause
            $table->string('daily_candle_cause', 20); // Opposing Candle, Swing Point
            $table->string('daily_img');
            $table->boolean('hourly_first_cisd')->default(0);
            $table->string('hourly_img');
            $table->string('entry_tf', 5); // 1H, 30m, 15m, 5m, 1m
            $table->string('entry_img');
            $table->string('result')->nullable(); // win, lose, be
            $table->string('result_img')->nullable();
            $table->text('notes')->nullable();
            $table->integer('saldo')->nullable();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('journals');
    }
};