@extends('layouts.app')
@section('content')
    <h2>Add new Task</h2>
    
    <form method="POST" action="{{ route('tasks.store') }}" enctype="multipart/form-data">
        @csrf
        <div>
            <label for="">Title</label>
            <input type="text" name="title" id="" class="form-control" required>
        </div>
        <div>
            <label for="">Description</label>
            <textarea name="desc" id="" class="form-control"></textarea>
        </div>
        <div>
            <label for="">Image</label>
            <input type="file" name="image" class="form-control">
        </div>
        <button class="btn btn-primary mt-3" type="submit">SAVE</button>
    </form>
@endsection