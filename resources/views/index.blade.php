@extends('layouts.app')

@section('title', 'Tasks App')

@section('content')
    

@forelse($tasks as $task)
<div>
    <a href={{route('tasks.show', ['task' => $task->id])}}>
        {{ $task->title }}
    </a>
</div>
@empty
<p>No record</p>
@endforelse

@endsection