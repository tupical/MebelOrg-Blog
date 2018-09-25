<?php

namespace App\Http\Resources;

use Illuminate\Http\Resources\Json\Resource;

class Category extends Resource
{
    /**
     * Transform the resource into an array.
     */
    public function toArray($request): array
    {
        return [
            'id' => $this->id,
            'name' => $this->name,
            'slug' => $this->slug,
            'description' => $this->description,
            'created_at' => $this->created_at,
            'updated_at' => $this->updated_at,
            'image' => $this->image ? asset('/images/category/' . $this->image) : null,
            'posts' => $this->posts->pluck('slug'),
        ];
    }
}