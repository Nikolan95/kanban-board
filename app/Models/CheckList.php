<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class CheckList extends Model
{
    use HasFactory;

    protected $table = 'check_list';

    protected $fillable = [
        'task_id',
        'title',
        'completed',
    ];

    public function task(): BelongsTo
    {
        return $this->belongsTo(Task::class);
    }

}
