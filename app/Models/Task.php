<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Task extends Model
{
    use HasFactory;
    /** @use HasFactory<\Database\Factories\TaskFactory> */
    protected $fillable = ['title', 'task'];
}
