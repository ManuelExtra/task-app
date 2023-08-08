<?php

use App\Http\Requests\TaskRequest;
use Illuminate\Http\Request;
use Illuminate\Http\Response;
use Illuminate\Support\Facades\Route;
use App\Models\Task;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::view('/tasks/create', 'create')
    ->name('tasks.create');

Route::get('/', function () {
    return view('index', [
        'tasks' => Task::latest()->get()
    ]);
})->name('tasks.index');

Route::get('/tasks/{task}', function (Task $task) {
    return view('show', [
        'task' => $task
    ]);
})->name('tasks.show');

Route::get('/tasks/{task}/edit', function (Task $task) {
    return view('edit', [
        'task' => $task
    ]);
})->name('tasks.edit');

Route::post("/tasks/create", function (TaskRequest $request) {
    $data = $request->validated();

    $task = Task::create($data);

    return redirect()->route('tasks.show', ['task' => $task->id])->with('success', 'Task created successfully!');
})->name("tasks.store");

Route::put("/tasks/{task}", function (Task $task, TaskRequest $request) {
    $data = $request->validated();

    $task->update($data);

    return redirect()->route('tasks.show', ['task' => $task->id])->with('success', 'Task updated successfully!');
})->name('tasks.update');

Route::delete("/tasks/{task}", function (Task $task){
    $task->delete();

    return redirect()->route('tasks.index')->with('success', 'Task deleted successfully!');
})->name('tasks.destroy');

Route::get('hallo', function () {
    return redirect()->route('hello');
});

Route::get('hello', function () {
    return 'Hello';
})->name('hello');

Route::fallback(function () {
    return "All wrong routes fall back here.";
});