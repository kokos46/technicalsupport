<?php

namespace App\Http\Controllers;

use App\Models\Task;
use App\Models\User;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Mail;
use Illuminate\Database\Eloquent\Model;

class TaskController extends Controller
{
    public function index()
    {
        if (Auth::check()) {
            $tasks = Task::where("user_id", Auth::user()->id)->get();
            return view('tasks', ['tasks' => $tasks]);
        }
        return redirect('/login');
    }

    public function create()
    {
        $tasks = Task::all()->where('user_id', Auth::user()->id);
        if($tasks->isNotEmpty()) {
            $taskLatest = User::find(Auth::user()->id)->tasks()->latest()->first()->value('created_at');
            return view('create', ['taskLatest' => $taskLatest]);
        }
        return view('create');
    }

    public function insertTask(Request $request){
        if(Auth::check()){
                Task::insert(['title' => $request->input("title"),
                    'task' => $request->input("task"),
                    'created_at' => Carbon::now()->format('Y-m-d'),
                    'user_id' => Auth::user()->id]);
            return redirect('/techsupport');
        }
        return redirect('/login');
    }

    public function openTask(int $task_id){
        $task = Task::find($task_id);
        if (Auth::user()->status == 'manager'){
            Task::where('id', $task_id)->update(['viewed'=> true]);
        }
        return view('task', ['task' => $task]);
    }
}
