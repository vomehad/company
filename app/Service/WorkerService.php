<?php

namespace App\Service;

use App\Models\Worker;
use Illuminate\Support\Collection;

class WorkerService
{
    public function getAll(): Collection
    {
        return Worker::query()->where(['active' => true])->get();
    }
}
