<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Http\Request;

use App\Models\Post;

class Tag extends Model
{

    /**
     * Get the route key for the model.
     */
    public function getRouteKeyName(): string
    {
        if (request()->expectsJson()) {
            return 'id';
        }

        return 'name';
    }

    public function post()
    {
        $this->belongsToMany(Post::class);  
    }

    public static function getTagStr(Post $post): String
    {
        return $post->tag->pluck('name')->implode(',');
    }


    public function posts()
    {
        return $this->belongsToMany(Post::class);
    }
}
