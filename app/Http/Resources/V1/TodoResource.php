<?php

namespace App\Http\Resources\V1;

use Illuminate\Http\Request;
use Illuminate\Http\Resources\Json\JsonResource;

class TodoResource extends JsonResource
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
          'description' => $this->description,
          'is_done' => $this->is_done,
          'todo_list_id' => $this->todo_list_id
        ];
    }
}
