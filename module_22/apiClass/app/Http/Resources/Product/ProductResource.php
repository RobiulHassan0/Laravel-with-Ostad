<?php

namespace App\Http\Resources\Product;

use Illuminate\Http\Request;
use Illuminate\Http\Resources\Json\JsonResource;

class ProductResource extends JsonResource
{
    /**
     * Transform the resource into an array.
     *
     * @return array<string, mixed>
     */
    public function toArray(Request $request): array
    {
        return [
            "id"=> $this->id . ' Product ID',
            'name'=> $this->title,
            'price'=> (float)$this->price,
            'is_active' => (bool)$this->is_active,
            'created_at' => $this->created_at?->toDateTimeString() 
        ];
    } 
}
