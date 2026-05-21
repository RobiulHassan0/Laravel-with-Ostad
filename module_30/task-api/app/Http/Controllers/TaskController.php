<?php

namespace App\Http\Controllers;

use App\Models\Task;
use Illuminate\Http\Request;
use Illuminate\Validation\ValidationException;

class TaskController extends Controller
{
    public function index(){
    
        try {
            $tasks = Task::user()->orderByDesc('id')->get();

            return response()->json([
                'success' => false,
                'message' => 'Task list fetched successfully.',
                'tasks' => $tasks,
            ], 200);
        } catch  (\Throwable $e) {
            return response()->json([
                'success' => false,
                'message' => 'Smething went while fetching tasks',
                'errors' => $e->getMessage(),
            ]);
        }
    }
}
