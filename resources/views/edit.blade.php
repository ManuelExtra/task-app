@extends('layouts.app')

@section('title', 'Edit Task')

@section('content')
    <form action="{{ route('tasks.update', ['task' => $task->id]) }}" method="post">
        @csrf
        @method("PUT")
        <div>
            <label for="title">Title:</label>
            <input type="text" name="title" id="title" value="{{$task->title}}" />
        </div>
        @error('title')
            <p class="error-message">{{ $message }}</p>
        @enderror
        <div>
            <label for="description">Description:</label>
            <textarea name="description" id="description">{{$task->description}}</textarea>
        </div>
        @error('description')
            <p class="error-message">{{ $message }}</p>
        @enderror
        <div>
            <label for="long_description">Long description:</label>
            <textarea name="long_description" id="long_description">{{$task->long_description}}</textarea>
        </div>
        @error('long_description')
            <p class="error-message">{{ $message }}</p>
        @enderror

        <div>
            <button type="submit">Submit</button>
        </div>

    </form>
@endsection
