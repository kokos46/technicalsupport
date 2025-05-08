<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;
use Illuminate\Support\Facades\DB;


class Task extends Model
{
    use HasFactory;
    /** @use HasFactory<\Database\Factories\TaskFactory> */
    protected $fillable = ['title', 'task'];

    public function comments(): HasMany{
        return $this->hasMany(Comment::class);
    }
}
