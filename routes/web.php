<?php

use Illuminate\Support\Facades\Route;
use Illuminate\Http\Response;
use Illuminate\Http\Request;
use App\Http\Requests\TaskRequest;
use PhpParser\Node\Expr\FuncCall;
use \App\Models\Task;


Route::get('/',function(){
    return redirect()->route('task.index');
})->name('');

Route::get('/tasks', function ()  {

    return view('index', [
       'tasks' => Task::latest()->paginate(5)
    ]);
})->name('task.index');

Route::view('/tasks/create', 'create')
    ->name('task.create');

Route::get('/tasks/{task}/edit', function (Task $task)  {
    return view('edit', ['task' => $task]);
})->name('task.edit');

Route::get('/tasks/{task}', function (Task $task)  {
    return view('show', ['task' => $task]);
})->name('task.show');

Route::post('/tasks', function(TaskRequest $request) {

    $task = Task::create($request->validated());

    return redirect()->route('task.show', ['task' => $task -> id])
        ->with('success', 'Task created successfully!');
})->name('tasks.store');

Route::put('/tasks/{task}', function(Task $task, TaskRequest $request) {

    $task->update($request->validated());

    return redirect()->route('task.show', ['task' => $task -> id])
        ->with('success', 'Task updated successfully!');
})->name('tasks.update');

Route::delete('/tasks/{task}', function(Task $task){
    $task->delete();

    return redirect()->route('task.index')
    ->with('success','Task deleted successfully');
})->name('tasks.destroy');

Route::put('task/{task}/toggle-complete', function(Task $task){
    $task ->toggleComplete();

    return redirect()->back()
    ->with('success','Task updated successfully');
})->name('tasks.toggle-complete');

// Route::put('/tasks/{task}', function(Task $task, Request $request) {
//     $data = $request->validate([
//         'title' => 'required | max:25',
//         'description' => 'required',
//         'long_description' => 'required'
//     ]);

//    // $task = Task::findOrFail($id);
//     $task->title = $data['title'];
//     $task->description = $data['description'];
//     $task->long_description = $data['long_description'];

//     $task->save();

//     return redirect()->route('task.show', ['task' => $task -> id])
//         ->with('success', 'Task updated successfully!');
// })->name('tasks.update');



// Route::get('/tasks/{id}', function ($id)  {
//     return view('show', ['task' => Task::findOrFail($id)]);
// })->name('task.show');
//dd($request->all());

// Route::get('/hello', function () {

//     return 'Hello ';
// })->name('hello');

// Route::get('/greet/{name}', function ($name) {
//     return 'Hello ' .$name. '!';
// });

// Route::get('/hallo', function () {
//     return redirect()->route('hello');
//    });

// Route::fallback(function(){
//    return 'WHAT';
// });


// Route::get('/tasks', function () use($tasks) {
//     return view('index', [
//        'tasks' => $tasks
//     ]);
// })->name('task.index');

// Route::get('/tasks/{id}', function ($id) use($tasks) {
//     $task = collect($tasks) ->firstWhere('id', $id);

//     if(!$task){
//         abort(Response ::HTTP_NOT_FOUND);
//     }

//     return view('show', ['task' => $task]);
// })->
// class Task
// {
//   public function __construct(
//     public int $id,
//     public string $title,
//     public string $description,
//     public ?string $long_description,
//     public bool $completed,
//     public string $created_at,
//     public string $updated_at
//   ) {
//   }
// }

// $tasks = [
//   new Task(
//     1,
//     'Buy groceries',
//     'Task 1 description',
//     'Task 1 long description',
//     false,
//     '2023-03-01 12:00:00',
//     '2023-03-01 12:00:00'
//   ),
//   new Task(
//     2,
//     'Sell old stuff',
//     'Task 2 description',
//     null,
//     false,
//     '2023-03-02 12:00:00',
//     '2023-03-02 12:00:00'
//   ),
//   new Task(
//     3,
//     'Learn programming',
//     'Task 3 description',
//     'Task 3 long description',
//     true,
//     '2023-03-03 12:00:00',
//     '2023-03-03 12:00:00'
//   ),
//   new Task(
//     4,
//     'Take dogs for a walk',
//     'Task 4 description',
//     null,
//     false,
//     '2023-03-04 12:00:00',
//     '2023-03-04 12:00:00'
//   ),
// ];
