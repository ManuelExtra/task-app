@extends('layouts.app')

@section('title', $task->title)

@section('content')
    <p>{{ $task->description }}</p>
    <p>{{ $task->long_description }}</p>
    <p>{{ $task->created_at }}</p>

    <form action="{{route('tasks.destroy', ['task' => $task->id])}}" method="post">
        @csrf
        @method('DELETE')
        <button type="submit">Delete</button>
    </form>
@endsection
