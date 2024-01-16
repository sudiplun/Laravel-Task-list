<?php

use App\Models\Task;
use Illuminate\Support\Facades\Route;
use Illuminate\Http\Request;

// class Task
// {
//     public function __construct(
//         public int $id,
//         public string $title,
//         public string $description,
//         public ?string $long_description,
//         public bool $completed,
//         public string $created_at,
//         public string $updated_at
//     ) {
//     }
// }

// $tasks = [
//     new Task(
//         1,
//         'Buy groceries',
//         'Task 1 description',
//         'Task 1 long description',
//         false,
//         '2023-03-01 12:00:00',
//         '2023-03-01 12:00:00'
//     ),
//     new Task(
//         2,
//         'Sell old stuff',
//         'Task 2 description',
//         null,
//         false,
//         '2023-03-02 12:00:00',
//         '2023-03-02 12:00:00'
//     ),
//     new Task(
//         3,
//         'Learn programming',
//         'Task 3 description',
//         'Task 3 long description',
//         true,
//         '2023-03-03 12:00:00',
//         '2023-03-03 12:00:00'
//     ),
//     new Task(
//         4,
//         'Take dogs for a walk',
//         'Task 4 description',
//         null,
//         false,
//         '2023-03-04 12:00:00',
//         '2023-03-04 12:00:00'
//     ),
// ];

Route::get('/', function () {
    return redirect()->route('tasks.index');
});

Route::get('/tasks', function () {
    return view('index', [
        'tasks' => Task::latest()->get()
    ]);
})->name('tasks.index');


Route::view('/tasks/create', 'create')->name('task.create');

// Route::get('/tasks/{id}', function ($id) use ($tasks) {
//     $task = collect($tasks)->firstWhere('id', $id);
//     if (!$task) {
//         abort(\Illuminate\Http\Response::HTTP_NOT_FOUND);
//     }
//     return view('show', ['task' => $task]);
// })->name('tasks.show');


Route::get('/tasks/{id}/edit', function ($id) {
    return view('edit', [
        'task' => Task::findOrFail($id)
    ]);
})->name('tasks.edit');

Route::get('/tasks/{id}', function ($id) {
    return view('show', [
        'task' => Task::findOrFail($id)
    ]);
})->name('tasks.show');

Route::post('/tasks', function (Request $request) {
    // dd($request->all());
    $data = $request->validate(
        [
            'title' => 'required | max:255',
            'description' => 'required',
            'long_description' => 'required'
        ]
    );
    $task = new Task;
    $task->title = $data['title'];
    $task->description = $data['description'];
    $task->long_description = $data['long_description'];
    $task->Save();

    return redirect()->route('tasks.show', ['id' => $task->id])
        ->with('success', 'you have successfully add task.');
})->name('tasks.store');

//edit task on the form started route
Route::put('/tasks/{id}', function ($id, Request $request) {
    // dd($request->all());
    $data = $request->validate(
        [
            'title' => 'required | max:255',
            'description' => 'required',
            'long_description' => 'required'
        ]
    );
    $task = Task::findOrFail($id);
    $task->title = $data['title'];
    $task->description = $data['description'];
    $task->long_description = $data['long_description'];
    $task->Save();

    return redirect()->route('tasks.show', ['id' => $task->id])
        ->with('success', 'you have successfully update task.');
})->name('tasks.update');
