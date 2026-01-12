<?php

namespace App\Http\Controllers;
use App\Http\Requests\StoreTaskRequest;
use App\Http\Resources\Task\TaskCollection;
use App\Http\Resources\Task\TaskResource;
use App\Models\Task; 
use Exception;
use Illuminate\Http\Request;

class TaskController extends Controller
{
    public function test(Request $request)
    {
        $name = $request->name;
        $email = $request->email;
        return response()->json([
            'name' => $name,
            'email'=> $email,
            'message' => 'Test endpoint is working',
        ]);
    }

    public function getTasks(){
        $tasks = Task::all();
        return response()->json([
            'message' => 'Tasks retrived success',
            'data' => new TaskCollection($tasks),
        ]);
    }

    public function store(StoreTaskRequest $request){
        $validateData = $request->validated();
        $request->input('title');
        try{
            $imagePath = null;
            if($request->hasFile('image')){
                $imagePath = $request->file('image')->store('tasks/test', 'public');
            }

            $task = Task::create([
                'title' => $validateData['title'],
                'description' => $validateData['description'],
                'image' => $imagePath,
            ]);

            return response()->json([
                'message' => 'Task Created Successfull',
                'data'=> $task
            ], 201);
        }catch( Exception $e){
            return response()->json([
                'message'=> 'Task Createion Failed',
                'error' => $e->getMessage()
            ], 500);
        }

    }

    public function edit($id){
        try{
            $task = Task::findOrFail($id);
            return response()->json([
                'message'=> 'Task rtrived to edit Successfully',
                'data'=> new TaskResource($task)
            ], 201);
        }catch(Exception $e){
            return response()->json([
                'message' => 'Task Failed to Edit',
                'error' => $e->getMessage()
            ], 500);
        }
    }

    public function destroy($id){
        $task = Task::findOrFail( $id)->delete();
        return response()->json([
            'message'=> 'Task Deleted Successfully',
        ]);
    }

}
