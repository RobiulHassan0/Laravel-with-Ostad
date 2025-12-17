@extends('layouts.app')
@section('content')
    <h2>Add new Task</h2>
    
    <form method="POST" action="{{ route('tasks.store') }}" enctype="multipart/form-data">
        @csrf
        <div>
            <label for="">Title</label>
            <input type="text" name="title" id="" class="form-control @error('title') is-invalid @enderror" value="{{old('title')}}">
            @error('title') <p style="color: red;">{{$message}}</p> @enderror
        </div>
        <div>
            <label for="">Description</label>
            <textarea name="description" id="" class="form-control @error('description') is-invalid @enderror">{{old('description')}}</textarea>
            @error('description') <p style="color: red;">{{$message}}</p> @enderror
        </div>
        <div>
            <label for="">Image</label>
            <input type="file" name="image" class="form-control @error('image') is-invalid @enderror">
            @error('image') <p style="color: red;">{{$message}}</p> @enderror
        </div>
        <button class="btn btn-primary mt-3" type="submit">SAVE</button>
    </form>
@endsection