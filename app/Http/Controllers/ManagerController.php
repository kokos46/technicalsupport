<?php

namespace App\Http\Controllers;

use App\Mail\AnswerMail;
use App\Mail\CloseTaskMail;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Models\Task;
use Illuminate\Support\Facades\Mail;

class ManagerController extends Controller
{
    public function index(){
        if(Auth::user()['status'] == 'manager'){
            $tasks = Task::all();
            return view('manager.index', ['tasks' => $tasks]);
        }
        return redirect('/login');
    }
    public function closetask(int $id){
        if(Auth::user()['status'] == 'manager'){
            Task::where('id', $id)->update(['completed'=> 1]);

            $userId = Task::where('id', $id)->value('user_id');
            $userEmail = User::find($userId)->email;

            Mail::to($userEmail)->send(new CloseTaskMail($id));
            return redirect('/manager');
        } else if(Auth::user()['status'] == 'user'){
            Task::where('id', $id)->update(['completed'=> 1]);

            $emails = User::where('status', 'manager')->pluck('email')->toArray();

            Mail::to($emails)->send(new CloseTaskMail($id));
            return redirect('/manager');
        }
        return view('manager.nopermission');
    }
    public function getAnswer(Request $request, int $id){
        if(Auth::user()['status'] == 'manager'){
            $request->validate([
                'text' => 'required'
            ]);
            Task::where('id', $id)->update(['answer' => $request->input('text')]);

            $userId = Task::where('id', $id)->value('user_id');
            $userEmail = User::find($userId)->email; // Правильное получение email

            Mail::to($userEmail)->send(new AnswerMail());
            return redirect('/task/'.$id);
        }
        return redirect('/error');
    }
    public function errorPage(){
        return view('manager.nopermission');
    }
    public function takeTask(int $id){
        if(Auth::user()['status'] == 'manager'){
            Task::where('id', $id)->update(['manager'=> Auth::user()['name']]);
            return redirect('/task/'.$id);
        }
        return redirect('/login');
    }
}
