<?php

namespace Database\Seeders;

use App\Models\Worker;
use Faker\Factory;
use Illuminate\Database\Seeder;

class WorkerSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        for ($o = 0; $o < 13; $o++) {
            $faker = Factory::create('ru_RU');
            $worker = new Worker();
            $worker->name = $faker->name;
            $worker->department_id = 1;
            $worker->position_id = rand(1,2);
            $worker->save();
        }

        for ($o = 0; $o < 9; $o++) {
            $faker = Factory::create('ru_RU');
            $worker = new Worker();
            $worker->name = $faker->name;
            $worker->department_id = 2;
            $worker->position_id = rand(1,2);
            $worker->save();
        }

        for ($o = 0; $o < 38; $o++) {
            $faker = Factory::create('ru_RU');
            $worker = new Worker();
            $worker->name = $faker->name;
            $worker->department_id = 3;
            $worker->position_id = rand(1,2);
            $worker->save();
        }
    }
}
