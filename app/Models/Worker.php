<?php

namespace App\Models;

use App\Models\Dict\Position;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

/**
 * @property int $id
 * @property string $name
 * @property int $position_id
 * @property int $branch_id
 * @property bool $active
 *
 * @property Position $position
 * @property Branch $branch
 */
class Worker extends Model
{
    use HasFactory;

    protected $table = 'workers';

    public function branch(): BelongsTo
    {
        return $this->belongsTo(Branch::class, 'branch_id', 'id');
    }

    public function position(): BelongsTo
    {
        return $this->belongsTo(Position::class, 'position_id', 'id');
    }
}
