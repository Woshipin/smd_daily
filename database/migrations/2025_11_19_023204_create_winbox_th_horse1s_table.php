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
        Schema::create('winbox_th_horse_1', function (Blueprint $table) {
            $table->id();
            $table->string('location');   // 比赛日期
            $table->time('time');       // 比赛时间 (24小时制)
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('winbox_th_horse_1');
    }
};
