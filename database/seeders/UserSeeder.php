<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\User;
use Illuminate\Support\Facades\Hash;

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        // 為了避免重複執行 seeder 時產生重複的資料，可以先清空資料表
        // 注意：這會刪除所有使用者！請小心使用
        User::truncate();

        $users = [
            [
                'name' => 'aaa',
                'email' => 'aaa@gmail.com',
                'password' => Hash::make('123456'),
            ],
            [
                'name' => 'bbb',
                'email' => 'bbb@gmail.com',
                'password' => Hash::make('123456'),
            ],
            [
                'name' => 'smd',
                'email' => 'smd@gmail.com',
                'password' => Hash::make('123456'),
            ],
        ];

        foreach ($users as $user) {
            User::create($user);
        }
    }
}