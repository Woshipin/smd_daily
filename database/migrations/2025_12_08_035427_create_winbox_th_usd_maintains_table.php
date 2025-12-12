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
        Schema::create('winbox_th_usd_maintains', function (Blueprint $table) {
            $table->id();
            $table->date('date');       // 日期
            $table->time('start_time'); // 开始时间 (24小时制)
            $table->time('end_time');   // 结束时间 (24小时制)
            $table->timestamps();
        });

        // 2. 子表：存储该时间段内的多个游戏/图片
        Schema::create('winbox_th_usd_maintain_items', function (Blueprint $table) {
            $table->id();
            // 外键关联到主表
            $table->foreignId('winbox_th_usd_maintain_id')->constrained('winbox_th_usd_maintains')->onDelete('cascade'); 
            $table->string('logo_path'); // 图片路径
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('winbox_th_usd_maintains');
    }
};
