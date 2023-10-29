<?php

namespace App\Http\Resources\V1;

use Illuminate\Http\Request;
use Illuminate\Http\Resources\Json\JsonResource;

class TodoListResource extends JsonResource
{
    /**
     * Transform the resource into an array.
     *
     * @return array<string, mixed>
     */
    public function toArray(Request $request): array
    {
        return [
          "id"=> $this->id,
          "created_at"=> $this->created_at->format("Y-m-d H:i:s"),
          "updated_at"=> $this->updated_at->format("Y-m-d H:i:s"),
          "name"=> $this->name,
          "todos" => new TodoCollection($this->todos),
        ];
    }
}
