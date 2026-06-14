<?php

namespace Database\Seeders;

use App\Models\Department;
use Illuminate\Database\Seeder;

class DepartmentSeeder extends Seeder
{
    public function run(): void
    {
        Department::insert([
            [
                'id' => 1,
                'department_name' => 'IT',
                'created_at' => '2026-06-14 06:46:25',
                'updated_at' => '2026-06-14 06:46:25',
                'deleted_at' => null,
            ],
            [
                'id' => 2,
                'department_name' => 'Human Resources',
                'created_at' => '2026-06-14 06:46:25',
                'updated_at' => '2026-06-14 06:46:25',
                'deleted_at' => null,
            ],
            [
                'id' => 3,
                'department_name' => 'Finance',
                'created_at' => '2026-06-14 06:46:25',
                'updated_at' => '2026-06-14 06:46:25',
                'deleted_at' => null,
            ],
            [
                'id' => 4,
                'department_name' => 'Marketing',
                'created_at' => '2026-06-14 06:46:25',
                'updated_at' => '2026-06-14 06:46:25',
                'deleted_at' => null,
            ],
        ]);
    }
}
