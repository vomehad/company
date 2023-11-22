<?php

namespace App\Http\Resources\Branch;

use App\Http\Resources\Worker\WorkerCollection;
use App\Models\Branch;
use Illuminate\Http\Request;
use Illuminate\Http\Resources\Json\JsonResource;

class BranchResource extends JsonResource
{
    /**
     * Transform the resource into an array.
     *
     * @return array<string, mixed>
     */
    public function toArray(Request $request): array
    {
        /** @var Branch $this */
        return [
            'id' => $this->id,
            'name' => $this->name,
            'workers' => new WorkerCollection($this->workers),
        ];
    }
}
