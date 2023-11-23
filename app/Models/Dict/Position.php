<?php

namespace App\Models\Dict;

use App\Models\Worker;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;
use Illuminate\Support\Collection;

/**
 * @property int $id
 * @property string $name
 *
 * @property Worker[]|Collection $workers
 */
class Position extends Model
{
    use HasFactory;

    protected $table = 'dict_positions';
    public $timestamps = false;

    public function workers(): HasMany
    {
        return $this->hasMany(Worker::class, 'worker_id', 'id');
    }
}
