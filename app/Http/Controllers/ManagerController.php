<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use App\Models\Task;

class ManagerController extends Controller
{
    public function index(){
        if(Auth::user()['status'] == 'manager'){
            $tasks = DB::table('tasks')->get();
            return view('manager.index', ['tasks' => $tasks]);
        }
        return redirect('/login');
    }
    public function closetask(int $id){
        if(Auth::check()){
            Task::where('id', $id)->update(['completed'=> 1]);
            return redirect('/manager');
        }
        return view('manager.nopermission');
    }
    public function getAnswer(Request $request, int $id){
        if(Auth::user()['status'] == 'manager'){
            // DB::table('tasks')->where('id', $id)->update(['answer' => $request->input('text')]);
            Task::where('id', $id)->update(['answer' => $request->input('text')]);
            return redirect('/task/'.$id);
        }
        return redirect('/error');
    }
    public function errorPage(){
        return view('manager.nopermission');
    }
}
