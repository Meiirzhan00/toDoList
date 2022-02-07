<?php

namespace App\Http\Controllers;

use App\Http\Requests\DetailsRequest;
use App\Models\Task;
use App\Models\User;
use Illuminate\Support\Facades\Auth;

class HomeController extends Controller
{

    public function home(){

//        $currentUser = User::find(Auth::id());
//        $allTasks = $currentUser->tasks->paginate(10);
        $tasks = Task::where('user_id',Auth::id())->paginate(8);
        return view("home.index",['task'=>$tasks]);
    }

    public function details($id){

        $task = new Task();
        return view("includes.details",['task'=>$task->find($id)]);
    }

    public function edit($id){

        $task = new Task();
        return view("includes.edit",['task'=>$task->find($id)]);


    }

    public function addTask(DetailsRequest $request){

        $task = new Task();
        $task->name = $request->input('name');
        $task->description = $request->input('description');
        $task->deadline = $request->input('deadline');
        $task->is_completed = 0;
        $task->user_id = Auth::id();

        $task->save();

        return redirect()->route('user.home')->with('success','The task has been added');
    }

    public function allTask(){

        $currentUser = User::find(Auth::id());
        return view("includes.alltasks",['task'=>$currentUser->tasks]);
    }

    public function editTask($id, DetailsRequest $request){

        $task = Task::find($id);
        $task->name = $request->input('name');
        $task->description = $request->input('description');
        $task->deadline = $request->input('deadline');
        $task->is_completed = $request->has('is_completed');

        $task->save();

        return redirect()->route('details',$id)->with('success','The task has been updated!');

    }

    public function deleteTask($id){

        Task::find($id)->delete();

        return redirect()->route('taskData')->with('success','The task has been deleted!');

    }
}
