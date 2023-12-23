<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\HasMany;

class Task extends Model
{
    use HasFactory;

    protected $table = 'task';

    protected $fillable = [
        'task_column_id',
        'created_user_id',
        'joined_user_id',
        'color_mark',
        'title',
        'label',
        'description',
        'priority'
    ];
    
    /**
    * Get the user that owns the phone.
    */
    public function createdUser(): BelongsTo
    {
        return $this->belongsTo(User::class, 'created_user_id');
    }

    /**
    * Get the user that owns the phone.
    */
    public function assingedUser(): BelongsTo
    {
        return $this->belongsTo(User::class, 'joined_user_id');
    }

    public function taskColumn(): BelongsTo
    {
        return $this->belongsTo(TaskColumn::class);
    }

    public function checkLists(): HasMany
    {
        return $this->hasMany(CheckList::class);
    }

    public function comments(): HasMany
    {
        return $this->hasMany(Comment::class);
    }
}
