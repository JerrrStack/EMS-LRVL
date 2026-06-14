<?php

namespace Database\Seeders;

use App\Models\User;
use Illuminate\Database\Seeder;

class UserSeeder extends Seeder
{
    public function run(): void
    {
        User::insert([
            [
                'id' => 1,
                'name' => 'System Administrator',
                'email' => 'first.user@gmail.com',
                'password' => '$2y$10$7wXAnBA65cbBdxqK2DbRZ.UfAqvYYBGVGIJmu69in2FI.EYE9vmvW',
                'role' => 'admin',
                'created_at' => '2026-06-14 06:46:25',
                'updated_at' => '2026-06-14 10:12:57',
                'deleted_at' => null,
            ],
            [
                'id' => 4,
                'name' => 'System Administrator',
                'email' => 'second.user@gmail.com',
                'password' => '$2y$10$7wXAnBA65cbBdxqK2DbRZ.UfAqvYYBGVGIJmu69in2FI.EYE9vmvW',
                'role' => 'user',
                'created_at' => '2026-06-14 09:01:17',
                'updated_at' => '2026-06-14 10:13:17',
                'deleted_at' => null,
            ],
        ]);
    }
}
