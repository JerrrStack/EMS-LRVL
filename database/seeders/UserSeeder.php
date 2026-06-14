<?php

namespace Database\Seeders;

use App\Models\User;
use Illuminate\Database\Seeder;

class UserSeeder extends Seeder
{
    public function run(): void
    {
        User::updateOrCreate(
            ['email' => 'first.user@gmail.com'],
            [
                'name' => 'System Administrator',
                'password' => 'test',
                'role' => 'admin',
            ]
        );

        User::updateOrCreate(
            ['email' => 'second.user@gmail.com'],
            [
                'name' => 'System Administrator',
                'password' => 'test',
                'role' => 'user',
            ]
        );
    }
}
