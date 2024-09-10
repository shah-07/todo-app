<?php


use App\Http\Controllers\TodoController;
use Illuminate\Support\Facades\Route;



//Dashboard
Route::get('/', function () {
    return view('app');
});


//Web Api Routes
Route::get('/todos', [TodoController::class, 'GetAllTodos']);
Route::post('/todos', [TodoController::class, 'CreateTodo']);
Route::patch('/todos/update', [TodoController::class, 'UpdateTodo']);
Route::delete('/todos/completed', [TodoController::class, 'deleteCompletedTodos']);
Route::delete('/todos/{id}', [TodoController::class, 'deleteTodo']);
