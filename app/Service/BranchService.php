<?php

namespace App\Service;

use App\Models\Branch;
use Illuminate\Support\Collection;

class BranchService
{
    public function getAll(): Collection
    {
        return Branch::query()->where(['active' => true])->get();
    }
}
