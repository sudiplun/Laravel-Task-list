@extends('layout.app')

@section('title', 'Edit Form')

@section('styles')
    <style>
        .error-message {
            color: red;
            font: 0.7rem;
        }
    </style>
@endsection

@section('content')
    <form method="POST" action="{{ route('tasks.update', ['id'=> $task->id]) }}">
        @csrf
        @method('put');
        <div>
            <label for="title">
                Title
            </label>
            <input type="text" name="title" id="title" value="{{ $task->title }}" />
            @error('title')
                <p class="error-message">{{ $message }}</p>
            @enderror
        </div>
        <div>
            <label for="description">Description</label>
            <textarea name="description" id="description" rows="5">{{ $task->description }}</textarea>
        </div>
        @error('description')
            <p class="error-message">{{ $message }}</p>
        @enderror
        <div>
            <label for="long_description">Long Description</label>
            <textarea name="long_description" id="long_description" rows="10">{{ $task->long_description }}</textarea>
        </div>
        @error('long_description')
            <p class="error-message"> {{ $message }} </p>
        @enderror
        <div>
            <button type="submit">Add Task</button>
        </div>
    </form>
@endsection
