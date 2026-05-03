<?php

namespace App\Http\Resources\Task;

use Illuminate\Http\Request;
use Illuminate\Http\Resources\Json\JsonResource;

class TaskResource extends JsonResource
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
            'Task_title' => $this->title.'_Robin',
            "description" => $this->description,
            'image' => $this->image ? asset('storage/'.$this->image) : null,
            "created_at"=> $this->created_at?->toDateTimeString(),
        ];
    }
}
