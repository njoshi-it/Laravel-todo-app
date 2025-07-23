@extends('layouts.app')

@section('content')
<div class="container">
    <h2 class="mb-4 text-center">My Tasks</h2>

    <!-- Add Task Form -->
    <form action="{{ route('tasks.store') }}" method="POST" class="d-flex mb-4">
        @csrf
        <input type="text" name="title" class="form-control me-2" placeholder="Enter new task..." required>
        <button type="submit" class="btn btn-primary">Add Task</button>
    </form>

    <!-- Task List -->
    <ul class="list-group">
        @forelse($tasks as $task)
            <li class="list-group-item d-flex justify-content-between align-items-center">
                <form action="{{ route('tasks.toggle', $task->id) }}" method="POST" class="d-flex align-items-center">
                    @csrf
                    @method('PATCH')
                    <input type="checkbox" onchange="this.form.submit()" {{ $task->is_done ? 'checked' : '' }} class="me-2">
                    <span class="{{ $task->is_done ? 'text-decoration-line-through text-muted' : '' }}">
                        {{ $task->title }}
                    </span>
                </form>
                <form action="{{ route('tasks.destroy', $task->id) }}" method="POST">
                    @csrf
                    @method('DELETE')
                    <button class="btn btn-sm btn-danger">Delete</button>
                </form>
            </li>
        @empty
            <li class="list-group-item text-center text-muted">No tasks found.</li>
        @endforelse
    </ul>
</div>
@endsection
