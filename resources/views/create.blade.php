@extends('layouts.app')

@section('title', 'Add a task')

@section('styles')
    <style>
        .error-message{
            color: red;
            font-size: 0.8rem;
        }
    </style>
@endsection

@section('content')

    <h3>Create a Task</h3>

    <form action="{{ route('tasks.create') }}" method="post">
        @csrf
        <div>
            <label for="title">Title:</label>
            <input type="text" name="title" id="title" value="{{ old('title') }}"/>
        </div>
        @error('title')
            <p class="error-message">{{ $message }}</p>
        @enderror
        <div>
            <label for="description">Description:</label>
            <textarea name="description" id="description">{{ old('description') }}</textarea>
        </div>
        @error('description')
            <p class="error-message">{{ $message }}</p>
        @enderror
        <div>
            <label for="long_description">Long description:</label>
            <textarea name="long_description" id="long_description">{{ old('long_description') }}</textarea>
        </div>
        @error('long_description')
            <p class="error-message">{{ $message }}</p>
        @enderror

        <div>
            <button type="submit">Submit</button>
        </div>

    </form>

@endsection
