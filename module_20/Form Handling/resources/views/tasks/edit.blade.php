@extends('layouts.app')
@section('content')
    <h2>Edit Task</h2>
    
    <form method="POST" action="{{ route('tasks.update', $tasks->id) }}" enctype="multipart/form-data">
        @csrf
        <div>
            <label for="">Title</label>
            <input type="text" name="title" id="" value="{{ $tasks->title }}" class="form-control" required>
        </div>
        <div>
            <label for="">Description</label>
            <textarea name="desc" id="" class="form-control" >{{ $tasks->description }}</textarea>
        </div>
        <div>
            <label for="">Image</label>
            <input type="file" name="image" class="form-control">
            @if ($tasks->image)
                <img src="{{ asset('storage/'.$tasks->image) }}" style="width: 200px">
            @endif
        </div>
        <button class="btn btn-primary mt-3" type="submit">UPDATE</button>
        <button class="btn btn-primary mt-3" type="submit">BACK</button>
    </form>
@endsection