@extends('layouts.app')

@section('title', 'List of tasks')

@section('content')

    <nav class="mb-4">
        <a href="{{ route('tasks.create') }}" class="link">Add Task</a>
    </nav>

    @forelse($tasks as $task)
        <div>
            <a href={{ route('tasks.show', ['task' => $task->id]) }}>
                @if ($task->completed)
                    <s>{{ $task->title }}</s>
                @else
                    {{ $task->title }}
                @endif
            </a>
        </div>
    @empty
        <p>No record</p>
    @endforelse

    @if ($tasks->count())
        <nav class="mt-4">{{ $tasks->links() }}</nav>
    @endif

@endsection
