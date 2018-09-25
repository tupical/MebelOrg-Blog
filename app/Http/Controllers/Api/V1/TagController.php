<?php

namespace App\Http\Controllers\Api\V1;

use App\Http\Controllers\Controller;
use App\Http\Requests\Admin\PostsRequest;
use App\Http\Resources\Tag as TagResource;
use App\Models\Tag;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\Request;
use Illuminate\Http\Resources\Json\ResourceCollection;
use Collective\Html\Eloquent\FormAccessible;



class TagController extends Controller
{
    public function show(Tag $tag)
    {
        return new TagResource($tag);
    }
}