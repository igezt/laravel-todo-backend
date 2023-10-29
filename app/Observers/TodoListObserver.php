<?php

namespace App\Observers;

use App\Models\Todo;
use App\Models\TodoList;

class TodoListObserver
{
    public function created(TodoList $todoList)
    {
        $this->touchTodoList($todoList);
    }

    public function updated(TodoList $todoList)
    {
        $this->touchTodoList($todoList);
    }

    public function deleted(TodoList $todoList)
    {
        $this->touchTodoList($todoList);
    }

    /**
     * Update the TodoList's updated_at timestamp.
     *
     * @param  \App\Models\TodoList  $todoList
     * @return void
     */
    protected function touchTodoList(TodoList $todoList)
    {
        $todoList->touch();
    }
}