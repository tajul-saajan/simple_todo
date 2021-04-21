<?php

namespace App\Http\Controllers;

use App\Http\Requests\TodoCreateRequest;
use App\Models\ToDo;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Redirect;
use Illuminate\Support\Facades\Validator;

class ToDoController extends Controller
{
    public function index()
    {
//        $todos = ToDo::where('user_id',auth()->id())->orderBy('completed')->get();
        $todos = auth()->user()->todos->sortBy('completed');
        return view('todos.index', compact('todos'));
    }

    public function create()
    {
        return view('todos.create');
    }

    public function store(TodoCreateRequest $request)
    {
        auth()->user()->todos()->create($request->all());
        return redirect()->back()->with('message', 'Todo Created Successfully');
    }

    public function edit(ToDo $todo)
    {
        return view('todos.edit', compact('todo'));
    }

    public function update(ToDo $todo, TodoCreateRequest $request)
    {
        $todo->update($request->all());
        return redirect(route('todos.index'))->with('message', 'Task Updated!');
    }

    public function show(ToDo $todo)
    {
        return view('todos.show', compact('todo'));
    }

    public function complete(ToDo $todo)
    {
        $todo->update(['completed'=>true]);
        return redirect(route('todos.index'))->with('message', 'Task marked as Completed!');

    }

    public function incomplete(ToDo $todo)
    {
        $todo->update(['completed'=>false]);
        return redirect(route('todos.index'))->with('message', 'Task removed from Completed!');

    }

    public function destroy(ToDo $todo)
    {
        $todo->delete();
        return redirect(route('todos.index'))->with('message', 'Task Deleted!');

    }
}
