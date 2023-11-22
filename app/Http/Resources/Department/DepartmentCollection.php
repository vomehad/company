<?php

namespace App\Http\Resources\Department;

use Illuminate\Contracts\Support\Arrayable;
use Illuminate\Http\Request;
use Illuminate\Http\Resources\Json\ResourceCollection;

class DepartmentCollection extends ResourceCollection
{
    public $collects = DepartmentResource::class;

    /**
     * Transform the resource collection into an array.
     *
     * @param Request $request
     * @return Arrayable
     */
    public function toArray(Request $request): Arrayable
    {
        return $this->collection;
    }
}
