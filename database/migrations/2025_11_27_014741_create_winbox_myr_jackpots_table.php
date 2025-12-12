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
        Schema::create('winbox_myr_jackpots', function (Blueprint $table) {
            $table->id();

            // 第一层
            $table->string('amount')->nullable();
            $table->string('prize_value_today')->nullable();
            $table->string('prize_value_current')->nullable();

            // 第二层
            $table->string('third_prize_title')->nullable();
            $table->string('bonus_badge')->nullable();
            $table->string('detail_label_thai_1')->nullable();
            $table->string('detail_label_thai_2')->nullable();
            $table->string('detail_label_english_1')->nullable();
            $table->string('detail_label_english_2')->nullable();
            $table->string('detail_value_1')->nullable();
            $table->string('detail_value_2')->nullable();
            $table->string('detail_value_3')->nullable();

            // 第三层
            $table->string('section_title')->nullable();
            $table->string('bonus_section_title')->nullable();
            
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('winbox_myr_jackpots');
    }
};
