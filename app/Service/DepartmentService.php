<?php

namespace App\Service;

use App\Models\Department;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Collection;

class DepartmentService
{
    public function getAll(): Collection
    {
        return Department::query()->where(['active' => true])->get();
    }

    public function add(array $data): Department
    {
        $department = new Department();
        $department->fill($data);

        $department->save();

        return $department;
    }

    public function getOneById(int $id): Department|Model
    {
        return Department::query()
            ->where(['active' => true])
            ->where(['id' => $id])
            ->firstOrFail();
    }
}
