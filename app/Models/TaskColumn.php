<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;

class TaskColumn extends Model
{
    use HasFactory;

    protected $table = 'task_column';

    protected $fillable = [
        'column_name',
        'order'
    ];

    public function tasks(): HasMany
    {
        return $this->hasMany(Task::class)->orderBy('priority', 'asc');
    }
}
