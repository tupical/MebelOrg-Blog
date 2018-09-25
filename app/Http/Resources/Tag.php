<?php

namespace App\Http\Resources;

use Illuminate\Http\Resources\Json\Resource;
use App\Models\Post;
class Tag extends Resource
{
    /**
     * Transform the resource into an array.
     */
    public function toArray($request): array
    {
        return [
            'post' => $this->posts->pluck('slug'),
        ];
    }
}