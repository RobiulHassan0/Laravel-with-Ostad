<?php

namespace App\Http\Controllers;

use App\Models\Task;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class TestController extends Controller
{
    public function getTasks(){
        // $tasks = DB::table('tasks')->get();
        $tasks = Task::all();
        return response()->json($tasks);
    }
}
