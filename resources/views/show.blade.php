@extends('layout.app')

@section('title', $task->title)

@section('content')
    <p>{{ $task->description }}</p>

    @if ($task->long_description)
        <p>{{ $task->long_description }}</p>
    @endif

    <div class="mt-3 mb-3">
        <p>{{ $task->created_at }}</p>
        <p>{{ $task->updated_at }}</p>
    </div>

    <p class="mt-4 mb-4 font-bold text-blue-400">
        @if ($task->completed)
            Completed
        @else
            Not Completed
        @endif
    </p>

    <div class="underline font-semibold decoration-sky-500">
        <a href="{{ route('tasks.edit', ['task' => $task]) }}">Edit</a>
    </div>

    <div>
        <form method="POST" action="{{ route('tasks.toggle-complete', ['task' => $task]) }}">
            @csrf
            @method('PUT')
            <button type="submit">
                Mark as {{ $task->completed ? 'Not compeleted' : 'compeleted' }}
            </button>
        </form>
    </div>

    <div>
        <form action="{{ route('tasks.destroy', ['task' => $task]) }}" method="POST">
            @csrf
            @method('DELETE')
            <button type="submit" class="text-red-800 ">Delete</button>
        </form>
    </div>
@endsection
