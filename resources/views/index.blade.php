<h1>This To-do list.</h1>
<div>
    <div><a href="{{ route('tasks.create') }}">Add Task</a></div>
    @forelse ($tasks as $task)
    <div>
        <a href="{{ route('tasks.show', ['task' => $task->id]) }} ">
            {{ $task->title }}
        </a>
    </div>
    @empty
    <div>There no task.</div>
    @endforelse
    @if ($tasks->count())
    <nav>
        {{ $tasks->links() }}
    </nav>
    @endif
</div>
