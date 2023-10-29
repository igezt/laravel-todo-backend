<?php

namespace App\Http\Controllers\Api\v1;

use App\Http\Resources\V1\TodoListCollection;
use App\Http\Resources\V1\TodoListResource;
use App\Models\TodoList;
use App\Http\Requests\V1\StoreTodoListRequest;
use App\Http\Requests\V1\UpdateTodoListRequest;
use App\Http\Controllers\Controller;

class TodoListController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $todoLists = TodoList::with('todos')->get();

        return new TodoListCollection($todoLists);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(StoreTodoListRequest $request)
    {
        return new TodoListResource(TodoList::create($request->all()));
    }

    /**
     * Display the specified resource.
     */
    public function show(TodoList $todoList)
    {
      return new TodoListResource($todoList);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(UpdateTodoListRequest $request, TodoList $todoList)
    {
      $todoList->update($request->all());
      return new TodoListResource($todoList);
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(TodoList $todoList)
    {
      $todoList->delete();
      return new TodoListResource($todoList);
    }
}
