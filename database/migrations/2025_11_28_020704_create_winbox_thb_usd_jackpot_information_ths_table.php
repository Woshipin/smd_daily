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
        Schema::create('winbox_thb_usd_jackpot_information_th', function (Blueprint $table) {
            $table->id();
            $table->string('summary_label_th')->nullable();
            $table->string('summary_value_th')->nullable();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('winbox_thb_usd_jackpot_information_th');
    }
};
