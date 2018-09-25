<?php

namespace App\Http\Resources;

use Illuminate\Http\Resources\Json\Resource;
use App\Models\Category;
class Post extends Resource
{

    /**
     * Transform the resource into an array.
     */
    public function toArray($request): array
    {
        return [
            'tag' => $this->tag,
            'favorites' => $this->favor->pluck('name')->toArray(),
            'p_rating' => $this->p_rating,
            'view_count' => $this->view_count,
            'meta_title' => $this->meta_title,
            'meta_description' => $this->meta_description,
            'author' => $this->author,
            'id' => $this->id,
            'title' => $this->title,
            'slug' => $this->slug,
            'category' => Category::where('id', $this->category_id)->pluck('name')->implode('name'),
            //'categories' => Category::where('id', '!=', $this->category_id)->get(),
            'image' => asset('/images/post/' . $this->image) ,
            'image_preview' => $this->image_preview ? asset('/images/post/' . $this->image_preview) : '',
            'content' => $this->content,
            'short_content' => $this->short_content,
            'posted_at' => $this->posted_at ? $this->posted_at->toIso8601String() : null,
            'author_id' => $this->author_id,
            'comments_count' => $this->comments_count ?? $this->comments()->count(),
            'thumbnail_url' => $this->when($this->hasThumbnail(), url(optional($this->thumbnail)->getUrl())),
            'thumb_thumbnail_url' => $this->when($this->hasThumbnail(),
                url(optional($this->thumbnail)->getUrl('thumb')),
                '/img/news-big-1.png'
            )
        ];
    }
} 
  