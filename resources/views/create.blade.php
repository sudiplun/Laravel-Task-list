@extends('layout.app')

@section('title', 'Form')

@section('styles')
    <style>
        .error-message {
            color: red;
            font: 0.7%;
        }
    </style>
@endsection

@section('content')
    <form method="POST" action="{{ route('task.store') }}">
        @csrf
        <div>
            <label for="title">
                Title
            </label>
            <input type="text" name="title" id="title" />
            @error('title')
                <p class="error-message">{{ $message }}</p>
            @enderror
        </div>
        <div>
            <label for="description">Desription</label>
            <textarea name="description" id="description" rows="5"></textarea>
        </div>
        @error('description')
            <p class="error-message">{{ $message }}</p>
        @enderror
        <div>
            <label for="long_description">Long Desription</label>
            <textarea name="long_description" id="long_description" rows="10"></textarea>
        </div>
        @error('long_description')
            <p class="error-message"> {{ $message }} </p>
        @enderror
        <div>
            <button type="submit">Add Task</button>
        </div>
    </form>
@endsection
