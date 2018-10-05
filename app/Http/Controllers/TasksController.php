<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use \App\Task;

class TasksController extends Controller
{
    public function index()
    {        
        $data = [];
        if (\Auth::check()) {
            $user = \Auth::user();
            $tasks = $user->tasks()->orderBy('created_at', 'desc')->paginate(10);

            $data = [
                'user' => $user,
                'tasks' => $tasks,
            ];
          //  $data += $this->counts($user);
            return view('tasks.index', $data);
        }else {
            return view('welcome');
        }
    }
    public function store(Request $request)
    {
        $this->validate($request, [
            'content' => 'required|max:191',
        ]);

        $request->user()->tasks()->create([
            'content' => $request->content,
            'status' => $request->status,
        ]);

        return redirect('/');
    }
    public function destroy($id)
    {
        $task = \App\Task::find($id);

        if (\Auth::id() === $task->user_id) {
            $task->delete();
        }

        return redirect('/');
    }
    public function create()
    {
        $task = new \App\Task;

        return view('tasks.create', [
            'task' => $task,
        ]);
    }
    public function edit($id)
    {
        $task = Task::find($id);
       if (\Auth::id() === $task->user_id) {
        return view('tasks.edit', [
            'task' => $task,
            
        ]);
       }
        return redirect('/');        
        }
    public function update(Request $request, $id)
    {
        $message = Task::find($id);
       if (\Auth::id() === $task->user_id) {    
        $message->content = $request->content;
        $message->save();
       }
        return redirect('/');
    }
    public function show($id)
    {
        $task = Task::find($id);

       if (\Auth::id() === $task->user_id) {
        return view('tasks.show', [
            'task' => $task,
        ]);
       }
        return redirect('/');       
    }
}
