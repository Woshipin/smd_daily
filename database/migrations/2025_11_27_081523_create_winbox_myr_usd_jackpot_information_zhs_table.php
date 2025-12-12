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
        Schema::create('winbox_myr_usd_jackpot_information_zh', function (Blueprint $table) {
            $table->id();
            $table->string('summary_label_zh')->nullable();
            $table->string('summary_value_zh')->nullable();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('winbox_myr_usd_jackpot_information_zh');
    }
};
