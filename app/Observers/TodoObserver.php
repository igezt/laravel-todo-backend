<?php

namespace App\Observers;

use App\Models\Todo;
use App\Models\TodoList;

class TodoObserver
{
    public function created(Todo $todo)
    {
        $this->touchTodoList($todo);
    }

    public function updated(Todo $todo)
    {
        $this->touchTodoList($todo);
    }

    public function deleted(Todo $todo)
    {
        $this->touchTodoList($todo);
    }

    /**
     * Update the TodoList's updated_at timestamp.
     *
     * @param  \App\Models\Todo  $todo
     * @return void
     */
    protected function touchTodoList(Todo $todo)
    {
        // Load the todoList relationship if it's not already loaded
        if (!$todo->relationLoaded('todoList')) {
            $todo->load('todoList');
        }

        // Check if there's a related todoList and touch it to update the timestamps
        if ($todo->todoList) {
            $todo->todoList->touch();
        }
    }
}