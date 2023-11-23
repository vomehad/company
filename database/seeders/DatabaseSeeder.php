<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        $this->call(DictPositionSeeder::class);
        $this->call(DepartmentSeeder::class);
        $this->call(WorkerSeeder::class);
    }
}
