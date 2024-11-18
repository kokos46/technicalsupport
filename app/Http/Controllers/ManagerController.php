<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class ManagerController extends Controller
{
    public function index(){
        $tasks = DB::table('tasks')->get();
        return view('manager.index', ['tasks' => $tasks]);
    }
    public function closetask(int $id){
        DB::table('tasks')->where('id', $id)->update(['completed' => 1]);
        return redirect('/manager');
    }

    public function opentask(int $task_id){
        $task = DB::table('tasks')->where('id', $task_id)->first();
        return view('task', ['task' => $task]);
    }
}
