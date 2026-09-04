<?php

namespace App\Http\Controllers;

use App\Models\Task;
use Illuminate\Http\Request;
use Inertia\Inertia;

class TaskController extends Controller
{
    public function index()
    {
        $tasks = Task::latest()->get();
        return Inertia::render('Tasks/Index', [
            'tasks' => $tasks
        ]);
    }

    public function create()
    {
        return Inertia::render('Tasks/Create');
    }

    public function store(Request $request)
    {
        $validated = $request->validate([
            'title' => "required|string",
            'description' => "required|string",
            'completed' => 'boolean'
        ]);

        Task::create($validated);

        return redirect()->route('tasks.index')->with('success', 'Task created successfully');
    }

    public function edit(Task $task)
    {
        return Inertia::render('Tasks/Edit', [
            'task' => $task
        ]);
    }

    public function update(Request $request, Task $task)
    {
        $validated = $request->validate([
            'title' => "string|required",
            'description' => "string|required",
            'completed' => 'boolean'
        ]);

        $task->update($request->only('title', 'description', 'completed')); 

        return redirect()->route('tasks.index')->with('success', 'Task updated successfully');
    }

    public function destroy( Task $task){
        $task->delete();

        return redirect()->route('tasks.index')->with('success', 'Task deleted successfully');
    }
}
