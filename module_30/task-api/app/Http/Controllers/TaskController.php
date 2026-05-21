<?php

namespace App\Http\Controllers;

use App\Models\Task;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Validation\ValidationException;

class TaskController extends Controller
{
    public function index()
    {

        try {
            $tasks = Task::with('user:id,name')->orderByDesc('id')->get();

            return response()->json([
                'success' => true,
                'message' => 'Task list fetched successfully.',
                'tasks' => $tasks,
            ], 200);
        } catch (\Throwable $e) {
            return response()->json([
                'success' => false,
                'message' => 'Something went wrong while fetching tasks.',
                'errors' => $e->getMessage(),
            ], 500);
        }
    }

    public function store(Request $request)
    {
        try {
            $validated = $request->validate([
                'title' => 'required|string|max:50',
                'description' => 'nullable|string',
                'status' => 'required|string'
            ]);

            $task = $request->user()->tasks()->create([
                'title' => $validated['title'],
                'description' => $validated['description'] ?? null,
                'status' => $validated['status']
            ]);

            return response()->json([
                'success' => true,
                'message' => 'Task created successfully.',
                'task-data' => $task,
            ], 201);

        } catch (ValidationException $e) {
            return response()->json([
                'success' => false,
                'message' => 'Validation Error',
                'errors' => $e->errors(),
            ], 422);

        } catch (\Throwable $e) {
            return response()->json([
                'success' => false,
                'message' => 'Something went wrong while creating task.',
                'errors' => $e->getMessage(),
            ], 500);
        }
    }

    public function show(int $id)
    {
        try {
            $e = Task::with('user:id,name')->findOrFail($id);

            return response()->json([
                'success' => true,
                'message' => 'Task fetched successfully.',
                'task' => $e
            ]);

        } catch (\Throwable $e) {
            return response()->json([
                'success' => false,
                'message' => 'Something went wrong while fetching task.',
                'errors' => $e->getMessage()
            ]);
        }

    }

    public function update(Request $request, int $id)
    {
        try {
            $task = Task::findOrFail($id);

            $validated = $request->validate([
                'title' => 'sometimes|string|max:50',
                'description' => "nullable|sometimes|string|max:50",
                'status' => 'sometimes|string',
            ]);

            $task->update($validated);

            return response()->json([
                'success' => true,
                'message' => 'Task updated successfully.',
                'task-data' => $task
            ], 200);

        } catch (ValidationException $e) {
            return response()->json([
                'success' => false,
                'message' => 'Validation Error',
                'errors' => $e->errors(),
            ], 422);

        } catch (\Throwable $e) {
            return response()->json([
                'success' => false,
                'message' => 'Something went wrong while updating Task.',
                'errors' => $e->getMessage()
            ], 500);
        }
    }

    public function destroy(int $id)
    {
        try {
            $task = Task::findOrFail($id);
            $task->delete();
            
            return response()->json([
                'success' => true,
                'message' => 'Task deleted successfully.',
            ], 200);
        }catch ( \Throwable $e){
            return response()->json([
                'success' => false,
                'message' => 'Something went wrong while deleting task.',
                'errors' => $e->getMessage()
            ], 500);
        }
    }
}
