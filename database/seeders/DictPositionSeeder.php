<?php

namespace Database\Seeders;

use App\Models\Dict\Position;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class DictPositionSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $data = [
            'Инженер',
            'Рядовой',
        ];

        foreach ($data as $name) {
            $position = new Position();
            $position->name = $name;
            $position->save();
        }
    }
}
