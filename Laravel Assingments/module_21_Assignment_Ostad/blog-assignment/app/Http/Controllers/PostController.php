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

        $wordCount = str_word_count(strip_tags($data['content']));
        $readTime = ceil($wordCount / 200);
        $data['read_time'] = $readTime . ' min read';

        $data['user_id'] = auth()->id();
        
        if($data['status'] === 'published'){
            $data['published_at'] = now();
        }

        $post = Post::create($data);
        if(!$post){
            return redirect()->route('posts.allpost')->with('success', 'Post created successfully.');
        }
        return redirect()->route('posts.allpost')->with('error', 'Failed to create post. Please try again.');
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
