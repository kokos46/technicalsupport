<?php

namespace App\Http\Controllers;

use App\Mail\TaskMailer;
use App\Models\Task;
use App\Models\User;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Mail;

class TaskController extends Controller
{
    public function index()
    {
        $tasks = Task::where("user_id", Auth::user()->id)->get();
        return view('tasks', ['tasks' => $tasks]);
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
        if($request->isMethod('post')){
            if ($request->hasFile('image')){

                $request->validate([
                    'image' => 'required|image|mimes:jpeg,png,jpg',
                    'title' => 'required',
                    'task' => 'required'
                ]);

                $file = $request->file('image');
                $filename = time() . '_' . $file->getClientOriginalName(); // Генерация уникального имени файла
                $file->move(public_path('images'), $filename);

                Task::insert(['title' => $request->input("title"),
                    'task' => $request->input("task"),
                    'created_at' => Carbon::now()->format('Y-m-d'),
                    'user_id' => Auth::user()->id,
                    'filepath' => '/images/'.$filename
                ]);

                $emails = User::where('status', 'manager')->pluck('email')->toArray();
                Mail::to($emails)->send(new TaskMailer(
                    Auth::user()['name'],
                    $request->input("title"),
                    Carbon::now()->format('Y-m-d'),
                ));

                return redirect('/techsupport')
                    ->with('success', 'Task added successfully!');
            }
        }
    }

    public function openTask(int $task_id){
        $task = Task::find($task_id);

        if (Auth::user()->status == 'manager'){
            Task::where('id', $task_id)->update(['viewed'=> true]);
        }

        return view('task', ['task' => $task]);
    }
}
