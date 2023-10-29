<?php

use App\Http\Controllers\Api\v1\TodoController;
use App\Http\Controllers\Api\v1\TodoListController;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "api" middleware group. Make something great!
|
*/

Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
    return $request->user();
});

Route::group(['namespace' => 'App/Http/Controllers/api/v1'], function() {
  Route::get('todo-lists', [TodoListController::class,'index']);
  Route::post('todo-lists', [TodoListController::class,'store']);
  Route::get('todo-lists/{todoList}', [TodoListController::class,'show']);
  Route::patch('todo-lists/{todoList}', [TodoListController::class,'update']);
  Route::put('todo-lists/{todoList}', [TodoListController::class,'update']);
  Route::delete('todo-lists/{todoList}', [TodoListController::class,'destroy']);

  Route::get('todos', [TodoController::class, 'index']);
  Route::post('todos', [TodoController::class,'store']);
  Route::get('todos/{todo}', [TodoController::class,'show']);
  Route::patch('todos/{todo}', [TodoController::class,'update']);
  Route::put('todos/{todo}', [TodoController::class,'update']);
  Route::delete('todos/{todo}', [TodoController::class,'destroy']);
});
