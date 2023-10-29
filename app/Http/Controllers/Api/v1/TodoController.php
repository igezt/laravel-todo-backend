<?php

namespace App\Http\Controllers\Api\v1;

use App\Http\Resources\V1\TodoCollection;
use App\Http\Resources\V1\TodoResource;
use App\Models\Todo;
use App\Http\Requests\V1\StoreTodoRequest;
use App\Http\Requests\V1\UpdateTodoRequest;
use App\Http\Controllers\Controller;
use App\Models\TodoList;

class TodoController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        return new TodoCollection(Todo::all());
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(StoreTodoRequest $request)
    {
        return new TodoResource(Todo::create($request->all()));
    }

    /**
     * Display the specified resource.
     */
    public function show(Todo $todo)
    {
      return new TodoResource($todo);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(UpdateTodoRequest $request, Todo $todo)
    {
      $todo->update($request->all());
      return new TodoResource($todo);
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Todo $todo)
    {
      $todo->delete();
      return new TodoResource($todo);
    }
}
