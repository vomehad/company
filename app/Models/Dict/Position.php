<?php

namespace App\Models\Dict;

use App\Models\Worker;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;

/**
 * @property int $id
 * @property string $name
 *
 * @property Worker[] $workers
 */
class Position extends Model
{
    use HasFactory;

    protected $table = 'dict_positions';

    public function workers(): HasMany
    {
        return $this->hasMany(Worker::class, 'worker_id', 'id');
    }
}
