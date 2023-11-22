<?php

namespace App\Http\Resources\Branch;

use Illuminate\Contracts\Support\Arrayable;
use Illuminate\Http\Request;
use Illuminate\Http\Resources\Json\ResourceCollection;

class BranchCollection extends ResourceCollection
{
    public $collects = BranchResource::class;

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
