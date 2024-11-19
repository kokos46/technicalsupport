<?php

namespace App\Http\Controllers;

use App\Models\Task;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;

class TaskController extends Controller
{
    public function index()
    {
        if (Auth::check()) {
            $tasks = DB::table('tasks')->where('username', Auth::user()['name'])->get();
            return view('tasks', ['tasks' => $tasks]);
        }
        return redirect('/login');
    }

    public function create()
    {
        return view('create');
    }

    public function insertTask(Request $request){
        if(Auth::check()){
            Task::taskCreate($request->get('title'), $request->get('task'), Auth::user()['name']);
            return redirect('/techsupport');
        }
        return redirect('/login');
    }

    public function openTask(int $task_id){
        $task = DB::table('tasks')->where('id', $task_id)->first();
        return view('task', ['task' => $task]);
    }
}
