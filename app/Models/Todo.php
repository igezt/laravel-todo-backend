<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Todo extends Model
{
    use HasFactory;

    protected $fillable = [
      "id",
      'description',
      'is_done',
      'todo_list_id'
    ];
    
    public function todoList() {
      return $this->belongsTo(TodoList::class, 'todo_list_id');
    }
}
