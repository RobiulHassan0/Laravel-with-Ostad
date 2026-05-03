@extends('layouts.app')

@section('content')

    @if (session('success'))
        <div class="alert alert-success">{{ session('success') }}</div>
    @endif

    <h2>Task List</h2>

    <a href="{{ route('tasks.add') }}" class="btn btn-warning">Add Task</a>

    <table class="table table-bordered">
        <thead>
            <tr>
                <th>#</th>
                <th>Title</th>
                <th>Description</th>
                <th>Image</th>
                <th>Action</th>
            </tr>
        </thead>
        <tbody>
            @foreach ( $tasks as $task)
                <tr>
                    <td>{{ $task->id }}</td>
                    <td>{{ $task->title }}</td>
                    <td>{{ $task->description }}</td>
                    <td>
                        @if ($task->image)
                            <img src="{{asset('storage/'.$task->image) }}" style="width : 60px">
                        @else
                            N/A
                        @endif    
                    </td>
                    <td>
                        <a href="{{ route('tasks.edit', $task->id) }}" class="btn btn-primary">EDIT</a>
                        {{-- <a href="{{ route('tasks.edit') }}" class="btn btn-danger">DELETE</a> --}}
                        
                        <form action="{{ route('tasks.delete', $task->id) }}" method="POST" style="display: inline-block">
                            @csrf
                            <button type="submit" class="btn btn-danger" onclick="return confirm('Do you want to delete?')">DELETE</button>
                        </form>
                    </td>
                </tr>
            @endforeach
        </tbody>
    </table>
    {{ $tasks->links('pagination::bootstrap-5') }}
@endsection