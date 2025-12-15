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
                'name' => 'smd1',
                'email' => 'smd1@gmail.com',
                'password' => Hash::make('123456'),
            ],
            [
                'name' => 'smd2',
                'email' => 'smd2@gmail.com',
                'password' => Hash::make('123456'),
            ],
            [
                'name' => 'smd3',
                'email' => 'smd3@gmail.com',
                'password' => Hash::make('123456'),
            ],
            [
                'name' => 'smd4',
                'email' => 'smd4@gmail.com',
                'password' => Hash::make('123456'),
            ],
            [
                'name' => 'smd5',
                'email' => 'smd5@gmail.com',
                'password' => Hash::make('123456'),
            ],
            [
                'name' => 'smd6',
                'email' => 'smd6@gmail.com',
                'password' => Hash::make('123456'),
            ],
        ];

        foreach ($users as $user) {
            User::create($user);
        }
    }
}