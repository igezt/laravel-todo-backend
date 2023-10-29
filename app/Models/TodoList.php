<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class TodoList extends Model
{
    use HasFactory;

    protected $fillable = [
      "id",
      "name",
    ];

    public function todos() {
      return $this->hasMany(Todo::class, 'todo_list_id');
    }
}
