<?php

namespace App\Http\Controllers;

use App\Http\Requests\PostRequest;
use App\Models\Category;
use App\Models\Post;
use Illuminate\Support\Facades\Storage;

class PostController extends Controller
{
    public function postIndex() {
        $allPosts = Post::with(['category', 'user'])->latest()->get();
        $categories = Category::all();
        return view('admin.posts.allpost', compact('allPosts', 'categories'));
    }


    public function create(){
        $categories = Category::all();
        return view('admin.posts.create', compact('categories'));
    }

    
    public function store(PostRequest $request){
        
        $data = $request->validated();

        if($request->hasFile('image')){
            $image = $request->file('image');
            $imageName = time() . '_' . uniqid() . '.' . $image->getClientOriginalExtension();
            $path = $image->storeAs('posts', $imageName, 'public');
            $data['image'] = $path;
        }

        $data['user_id'] = auth()->id() ?? 1;
        
        if($data['status'] === 'published'){
            $data['published_at'] = now();
        }

        $data['read_time'] = ceil(str_word_count(strip_tags($data['content'])) / 200) . ' min';

        Post::create($data);
        return redirect()->route('admin.posts.allpost')->with('success', 'Post created successfully.');
    }

    public function edit($id){
        $post = Post::findOrFail($id);
        $categories = Category::all();
        return view('admin.posts.edit', compact('post', 'categories'));
    }

    public function update(PostRequest $request, $id){
        $post = Post::findOrFail($id); 
        $data = $request->validated();

        if($request->hasFile('image')){
            if($post->image){
                Storage::disk('public')->delete($post->image);
            } 

            $image = $request->file('image');
            $imageName = time() . '_' . uniqid() . '.' . $image->getClientOriginalExtension();
            $path = $image->storeAs('posts', $imageName, 'public');
            $data['image'] = $path;
        }

        if(isset($data['status']) && $data['status'] === 'published' && !$post->published_at){
            $data['published_at'] = now();
        }

        $post->update($data);
        return redirect()->route('admin.posts.allpost')->with('success', 'Post updated successfully.');
    }

    public function delete($id){
        $post = Post::findOrFail($id);
        if($post->image){
            Storage::disk('public')->delete($post->image);
        }

        $post->delete();
        return redirect()->back()->with('success', 'Post deleted successfully.');
    }
}
