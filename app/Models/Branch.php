<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;

/**
 * @property int $id
 * @property string $name
 * @property bool $active
 *
 * @property Worker[] $workers
 */
class Branch extends Model
{
    use HasFactory;

    protected $table = 'branchs';

    public function workers(): HasMany
    {
        return $this->hasMany(Worker::class, 'branch_id', 'id');
    }
}
