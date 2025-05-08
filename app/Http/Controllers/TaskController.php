<?php

namespace App\Http\Controllers;

use App\Mail\TaskMailer;
use App\Models\Comment;
use App\Models\Task;
use App\Models\User;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Mail;
use Spatie\ImageOptimizer\OptimizerChainFactory;

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
            $request->validate([
                'title' => 'required',
                'task' => 'required',
                'image' => 'nullable|image|mimes:jpeg,png,jpg'
            ]);

            $filename = null;
            if ($request->hasFile('image')){
                $file = $request->file('image');
                $filename = time() . '_' . $file->getClientOriginalName();
                $file->move(public_path('images'), $filename);

                $optimizer = OptimizerChainFactory::create();
                $optimizer->optimize(public_path('images/'.$filename));
            }

            Task::insert([
                'title' => $request->input("title"),
                'created_at' => Carbon::now()->format('Y-m-d'),
                'user_id' => Auth::user()->id,
                'filepath' => $filename ? '/images/'.$filename : null
            ]);

            Comment::insert([
                'task_id' => Task::where('title', $request->input("title"))->first()->id,
                'username' => Auth::user()->name,
                'comment' => $request->input("task"),
                'created_at' => Carbon::now()->format('Y-m-d'),
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


    public function openTask(int $task_id){
        $task = Task::find($task_id);
        $username = User::find($task->user_id)->name;
        $comments = Task::find($task_id)->comments()->get();

        if (Auth::user()->status == 'manager'){
            Task::where('id', $task_id)->update(['viewed'=> true]);
        }

        return view('task', ['task' => $task, 'comments' => $comments, 'username' => $username]);
    }

    public function sendMessage(int $id, Request $request){
        $request->validate([
            'text' => 'required'
        ]);

        Comment::insert([
            'task_id' => $id,
            'username' => Auth::user()->name,
            'comment' => $request->input("text"),
            'created_at' => Carbon::now()->format('Y-m-d'),
        ]);

        return redirect()->back();
    }
}
