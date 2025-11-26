<?php

namespace App\Http\Controllers;

use App\Models\Task;
use Illuminate\Support\Facades\Storage;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class TasksController extends Controller
{
    public function index(){

        $tasks = DB::table('tasks')->orderBy('id', 'desc')->paginate(5);

        return view("tasks.index", ['tasks' => $tasks]);
    }

    public function create(){
        return view('tasks.create');
    }

    public function store(Request $request){
        $imagePath = null;
        $title = $request->title;
        $description = $request->desc;

        if($request->hasFile('image')){
            $imagePath = $request->file('image')->store('tasks/test', 'public');
        }

        // DB::table('tasks')->insert([
        //     'title' => $title,
        //     'description' => $description,
        //     'image' =>  $imagePath,
        //     'updated_at' => now(),
        //     'created_at' => now(),
        // ]);

        $task = new Task();
        $task->title = $title;
        $task->description = $description;
        $task->image = $imagePath;
        $task->save();

        return redirect()->route('tasks.index')->with('success','Task Created Successfully');
    }

    
    public function edit($id){
        // $task = DB::table('tasks')->where('id', $id)->first();
        $task = Task::findOrFail($id);

        return view('tasks.edit', ['tasks' => $task]);
    } 

    public function update(Request $request, $id){
        $title = $request->title;
        $description = $request->desc;

        // $taskOld = DB::table('tasks')->where('id', $id)->first();
        $taskOld = Task::findOrFail($id);
        $imagePath = $taskOld->image;
        
        if($request->hasFile('image')){
            if($imagePath && Storage::disk('public')->exists($imagePath)){
                // Delete old image if exists
                Storage::disk('public')->delete($imagePath);
            }

            // store new image
            $imagePath = $request->file('image')->store('tasks/test', 'public');
        }

        // DB::table('tasks')->where('id', $id)->update([
        //     'title' => $title,
        //     'description' => $description,
        //     'image'=> $imagePath,
        //     'updated_at' => now(),
        // ]);

        $taskOld->title = $title;
        $taskOld->description = $description;
        $taskOld->image = $imagePath;
        $taskOld->save();

        return redirect()->route('tasks.index')->with('success', 'Task Updated Successfully');
    }
    
    public function destroy($id){
        // $taskOld = DB::table('tasks')->where('id', $id)->first();
        $taskOld = Task::findOrFail($id);

        $imagePath = $taskOld->image;

        if($imagePath && Storage::disk('public')->exists($imagePath)){
            Storage::disk('public')->delete($imagePath);
        }

        // DB::table('tasks')->where('id', $id)->delete();
        $taskOld->delete();
        return redirect()->route('tasks.index')->with('success','Task Deleted Successfully');
    }
}
