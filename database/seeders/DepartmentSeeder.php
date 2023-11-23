<?php

namespace Database\Seeders;

use App\Models\Department;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class DepartmentSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $data = [
            'Racoons',
            'Foxes',
            'Bears'
        ];

        foreach ($data as $name) {
            $department = new Department();
            $department->name = $name;
            $department->save();
        }
    }
}
