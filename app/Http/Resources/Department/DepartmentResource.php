<?php

namespace App\Http\Resources\Department;

use App\Http\Resources\Worker\WorkerCollection;
use App\Models\Department;
use Illuminate\Http\Request;
use Illuminate\Http\Resources\Json\JsonResource;

class DepartmentResource extends JsonResource
{
    /**
     * Transform the resource into an array.
     *
     * @return array<string, mixed>
     */
    public function toArray(Request $request): array
    {
        /** @var Department $this */
        return [
            'id' => $this->id,
            'name' => $this->name,
            'workers' => new WorkerCollection($this->workers->sortBy('name')),
        ];
    }
}
