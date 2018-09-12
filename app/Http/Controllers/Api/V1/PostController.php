<?php

namespace App\Http\Controllers\Api\V1;

use App\Http\Controllers\Controller;
use App\Http\Requests\Admin\PostsRequest;
use App\Http\Resources\Post as PostResource;
use App\Models\Post;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\Request;
use Illuminate\Http\Resources\Json\ResourceCollection;
use Illuminate\Support\Facades\Auth;
use App\Events\PostHasRating;
use Storage;

class PostController extends Controller
{
    /**
     * Return the posts.
     */
    public function index(Request $request): ResourceCollection
    {
        return PostResource::collection(
            Post::search($request->input('q'))->withCount('comments')->latest()->paginate($request->input('limit', 20))
        );
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(PostsRequest $request, Post $post): PostResource
    {
        $this->authorize('update', $post);

        $post->update($request->only(['title', 'content', 'posted_at', 'author_id', 'thumbnail_id', 'image']));

        return new PostResource($post);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(PostsRequest $request): PostResource
    {
        $this->authorize('store', Post::class);

        return new PostResource(
            Post::create($request->only(['title', 'content', 'posted_at', 'author_id', 'thumbnail_id']))
        );
    }

    /**
     * Return the specified resource.
     */
    public function show(Post $post): PostResource
    {
        return new PostResource($post);
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Post $post): JsonResponse
    {
        $this->authorize('delete', $post);

        $post->delete();

        return response()->noContent();
    }

    public function favoritePost(Post $post)
    {
        Auth::user()->favorites()->attach($post->id); return '1';
    }

    /*
    * * Unfavorite a particular post * *
     *  @param Post $post *
     * @return Response */

    public function unFavoritePost(Post $post)
    {
        Auth::user()->favorites()->detach($post->id); return '1';
    }

    public function updateRating(Request $request, Post $post)
    {
        session_start();
        if(!isset($_SESSION['hasrating']))
        {  
            $_SESSION['hasrating'] = 0;
        }
        if($_SESSION['hasrating'] != $post->id) 
        {
            $post->rating()->attach($request->rating);
            $post->update(['p_rating' => $post->rating->avg('value')]);
            $_SESSION['hasrating'] = $post->id;    
        }
        session_write_close();
        return '1';     
    }

    public function destroyImage($post)
    {
        $post_item = Post::where('slug', $post);
        Storage::delete($post_item->get()[0]->image);
        $post_image = $post_item->update(['image' => null]);
        return $post_image;
    }

    public function destroyImagePreview($post)
    {
        $post_item_pre = Post::where('slug', $post);
        Storage::delete($post_item_pre->get()[0]->image_preview);
        $post_image_pre = $post_item_pre->update(['image_preview' => null]);
        return $post_image_pre;
    }
}
