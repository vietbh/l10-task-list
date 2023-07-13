<?php
use App\Http\Requests\TaskRequest;
use App\Models\Task;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;


Route::get('/task', function ()  {
    return view('Task.index',[
        'tasks' => Task::latest()->paginate(2)
    ]);
})->name('tasks.index');

Route::view('/task/create','Task.create')->name('tasks.create');

Route::get('/task/{task}/edit', function(Task $task){
    return view('Task.edit',['tasks' => $task]);
})->name('tasks.edit');

Route::get('/task/{task}', function(Task $task){
    return view('Task.show',['tasks' => $task]);
})->name('tasks.show');

Route::post('/task', function(TaskRequest $request){

    $task = Task::create( $request->validated());

    return redirect()->route('tasks.show', ['task'=> $task->id])
    ->with('success', 'Task created successfully');
    
})->name('tasks.store');

Route::put('/task/{task}', function(Task $task,TaskRequest $request){
    $task->update($request->validated());

    return redirect()->route('tasks.show', ['task'=> $task->id])
    ->with('success', 'Task updated successfully');
    
})->name('tasks.update');

Route::delete('/task/{task}', function(Task $task){
    $task ->delete();

    return redirect()->route('tasks.index')->with('success','Delete Successfully!!');
})->name('tasks.destroy');

Route::put('/task/{task}/toggle-complete',function(Task $task){
    $task->toggleComplete();
    
    return redirect()->back()->with('success','Task update successfully!');
})->name('tasks.toggle-complete');



Route::fallback(function(){
    return 'Still got some where!!!';
});