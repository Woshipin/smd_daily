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
        Schema::create('winbox_myr_usd_maintain_information2', function (Blueprint $table) {
            $table->id();
            $table->text('intro_text')->nullable();
            $table->text('notice_text')->nullable();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('winbox_myr_usd_maintain_information2');
    }
};
