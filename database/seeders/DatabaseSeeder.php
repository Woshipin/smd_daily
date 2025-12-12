<?php

namespace Database\Seeders;

use App\Models\User;
// use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        // 這裡會告訴 Laravel 去執行 UserSeeder 檔案裡的 run() 方法
        $this->call([
            UserSeeder::class,
        ]);
    }
}
