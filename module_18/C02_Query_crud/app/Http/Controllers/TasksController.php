<?php

namespace App\Http\Controllers;

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

        DB::table('tasks')->insert([
            'title' => $title,
            'description' => $description,
            'image' =>  $imagePath,
            'updated_at' => now(),
            'created_at' => now(),
        ]);

        return redirect()->route('tasks.index')->with('success','Task Created Successfully');
    }
    
    public function edit($id){
        $task = DB::table('tasks')->where('id', $id)->first();

        return view('tasks.edit', ['tasks' => $task]);
    } 

    public function update(Request $request, $id){
        $title = $request->title;
        $description = $request->desc;

        $taskOld = DB::table('tasks')->where('id', $id)->first();
        $imageOldPath = $taskOld->image;

        // Delete old image if new image is uploaded
        if($request->hasFile('image')){
            // Optionally, delete the old image from storage
            Storage::disk('public')->delete($imageOldPath);

            // store new image
            $imagePath = $request->file('image')->store('tasks/test', 'public');
        }

        DB::table('tasks')->where('id', $id)->update([
            'title' => $title,
            'description' => $description,
            'image'=> $imagePath,
            'updated_at' => now(),
        ]);

        return redirect()->route('tasks.index')->with('success', 'Task Updated Successfully');
    }
    
    public function destroy($id){
        $taskOld = DB::table('tasks')->where('id', $id)->first();
        $imagePath = $taskOld->image;

        if($imagePath && Storage::disk('public')->exists($imagePath)){
            Storage::disk('public')->delete($imagePath);
        }

        DB::table('tasks')->where('id', $id)->delete();
        return redirect()->route('tasks.index')->with('success','Task Deleted Successfully');
    }
}
