@extends('layout.app')
@section('title', 'the list of tasks')
@section('content')
    <div>
        <nav class="mb-5">
            <a href="{{ route('tasks.create') }}" class="font-medium underline decoration-blue-500">Add Task</a>
        </nav>
        @forelse ($tasks as $task)
            <div>
                <a href="{{ route('tasks.show', ['task' => $task->id]) }}" @class(['line-through' => $task->completed])>
                    {{ $task->title }}
                </a>
            </div>
        @empty
            <div>There are no task!</div>
        @endforelse

        @if ($tasks->count())
            <nav class="mt-4">
                {{ $tasks->links() }}
            </nav>
        @endif
    </div>
@endsection
