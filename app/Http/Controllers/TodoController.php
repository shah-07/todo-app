<?php

namespace App\Http\Controllers;

use App\Models\Todo;
use Illuminate\Http\Request;

class TodoController extends Controller
{
    /**
     * Returns all Todo items
     */
    function GetAllTodos(Request $request)
    {
        return Todo::all();
    }

    /**
     * Creates a new Todo item
     */
    function CreateTodo(Request $request)
    {
        $validatedData = $request->validate([
            'text' => 'required|string',
            'completed' => 'required|boolean',
        ]);

        return Todo::create($validatedData);
    }

    /**
     * Updates one or multiple Todo items
     */
    function UpdateTodo(Request $request)
    {
        $todos = $request->all();

        foreach ($todos as $todo) {
            $id = $todo['id'];
            $text = $todo['text'];
            $completed = $todo['completed'];

            $todoItem = Todo::find($id);

            if ($todoItem) {
                $todoItem->text = $text;
                $todoItem->completed = $completed;
                $todoItem->save();
            } else {
                // Return an error response if the todo item is not found
                return response()->json(['error' => 'Todo item not found'], 404);
            }
        }

        return response()->json(['message' => 'Todo items updated successfully!']);
    }

    /**
     * Deletes all completed Todo items
     */
    public function deleteCompletedTodos()
    {
        Todo::where('completed', true)->delete();
        return response()->json(['message' => 'Completed todo items deleted successfully!']);
    }

    /**
     * Deletes a single Todo item
     */
    public function deleteTodo(Todo $id)
    {
        $id->delete();
        return response()->json(['message' => 'Todo deleted successfully!'], 200);
    }
}
