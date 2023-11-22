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
 * @property int $department_id
 * @property bool $active
 *
 * @property Position $position
 * @property Department $department
 */
class Worker extends Model
{
    use HasFactory;

    protected $table = 'workers';

    protected $fillable = [
        'name',
        'position_id',
        'department_id',
    ];

    public function department(): BelongsTo
    {
        return $this->belongsTo(Department::class, 'department_id', 'id');
    }

    public function position(): BelongsTo
    {
        return $this->belongsTo(Position::class, 'position_id', 'id');
    }
}
