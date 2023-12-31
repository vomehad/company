<?php

namespace App\Http\Resources\Worker;

use App\Models\Worker;
use Illuminate\Http\Request;
use Illuminate\Http\Resources\Json\JsonResource;

class WorkerResource extends JsonResource
{
    /**
     * Transform the resource into an array.
     *
     * @return array<string, mixed>
     */
    public function toArray(Request $request): array
    {
        /** @var Worker $this */
        return [
            'id' => $this->id,
            'name' => $this->name,
            'position' => $this->position->name,
        ];
    }
}
