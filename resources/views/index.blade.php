<h1>This To-do list.</h1>
<div>
    {{-- @if (count($tasks))
    @foreach ($tasks as $task)
    <div>{{ "this is title of task '$task -> title' }}</div>
    @endforeach
    @else
    <div>There is no task.</div>
    @endif --}}

    @forelse ($tasks as $task)
        <div>
            <a href="{{ route('tasks.show', ['id' => $task->id]) }} ">
                {{ $task->title }}
            </a>
        </div>
    @empty
        <div>There no task.</div>
    @endforelse
</div>
