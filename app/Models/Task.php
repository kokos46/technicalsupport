<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\DB;


class Task extends Model
{
    use HasFactory;
    /** @use HasFactory<\Database\Factories\TaskFactory> */
    protected $fillable = ['title', 'task'];
    public static function taskCreate(string $title, string $task, string $username = 'ximaxa'){
        DB::table('tasks')->insert([
            'title' => $title,
            'task' => $task,
            'username' => $username,
            'created_at' => now()
        ]);
    }
}
