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
        Schema::create('winbox_zh_football_information_2', function (Blueprint $table) {
            $table->id();
            $table->string('title');
            $table->longText('information'); // 使用 longText 来存储大量的描述内容
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('winbox_zh_football_information2s');
    }
};
