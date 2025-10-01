<?php

namespace Database\Seeders;

use App\Models\User;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run(): void
    {
        User::create([
            'name'  => 'テストユーザー',
            'email' => 'test@example.com',
            'password' => Hash::make('password'),
            'email_verified_at' => now(),
            'postal_code' => '123-4567',
            'address'     => '東京都テスト区1-2-3',
            'building'    => 'テストビル',
        ]);

        // 出品者用のダミーユーザー
        User::create([
            'name' => '出品者A',
            'email' => 'seller@example.com',
            'password' => Hash::make('password'),
            'email_verified_at' => now(),
            'postal_code' => '123-4567',
            'address'     => '東京都テスト区1-2-3',
            'building'    => 'テストビル',
        ]);
    }
}
