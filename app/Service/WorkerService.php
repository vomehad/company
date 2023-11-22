<?php

namespace App\Service;

use App\Models\Department;
use App\Models\Worker;
use Illuminate\Support\Collection;

class WorkerService
{
    public function getAll(): Collection
    {
        return Worker::query()->where(['active' => true])->get();
    }

    public function add(array $data): Worker
    {
        $worker = new Worker();
        $worker->fill($data);

        $worker->save();

        return $worker;
    }

    public function attachWorker(array $data): Worker
    {
        /** @var Worker $worker */
        $worker = Worker::query()->where(['id' => $data['worker_id']])->first();
        $worker->department_id = $data['department_id'];

        $worker->update();

        return $worker;

    }
}
