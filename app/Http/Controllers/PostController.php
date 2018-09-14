<?php

namespace App\Http\Controllers;

use App\Models\Post;
use App\Events\PostHasViewed;
use App\Http\Resources\Comment as CommentResource;
use App\Models\Comment;
use Illuminate\Http\Request;
use Illuminate\View\View;
use App\Models\Category;
use Illuminate\Support\Facades\Auth;

class PostController extends Controller
{
    /**
     * Show the application dashboard.
     */
    public function index(Request $request): View
    {
        $categories = Category::get();
        $category_posts=[];
        foreach($categories as $key=>$category){
            $category_posts[$key]['category']=$category;
            $category_posts[$key]['posts']=Post::with('author', 'category')
                                        ->where('published', 1)
                                        ->where('posted_at', '<=', NOW())
                                        ->where('category_id', $category->id)
                                        ->withCount('comments', 'thumbnail', 'likes')
                                        ->orderBy('posted_at', 'DESC')
                                        ->limit(8)
                                        ->get();
        }

        return view('posts.index', [
            'posts' => Post::search($request->input('q'))
                             ->with('author', 'category')
                             ->where('published', 1)
                             ->where('posted_at', '<=', NOW())
                            ->orderBy('posted_at', 'DESC')
                             ->withCount('comments', 'thumbnail', 'likes')
                             ->latest()
                             ->limit(3)
                             ->get(),
            'posts_popular' => Post::with('author', 'category')
                            ->where('published', 1)
                            ->withCount('comments', 'thumbnail', 'likes')
                            ->orderBy('view_count', 'desc')
                            ->limit(6)
                            ->get(),
            'categories' => $category_posts,
        ]);
    }

    /**
     * Display the specified resource.
     */
    public function show(Request $request, Post $post): View
    {
        $categories = [];

        $post->comments_count = $post->comments()->count();
        $post->likes_count = $post->likes()->count();
        $post->p_rating = $post->rating->avg('value');

        event(new PostHasViewed($post));
 
        return view('posts.show', [
            'post' => $post,
            'posts_random' => Post::where('id', '!=', $post->id)->orderByRaw("RAND()")->limit(6)->get(),
            'categories' => Category::where('id', '!=', $post->category->id)->get(),
            'rating' => number_format($post->p_rating, 1),
            'comments' => CommentResource::collection(
                Comment::latest()->where('post_id',$post->id)->limit(20)->get()
            )
        ]);
    }

    /*
    * * Favorite a particular post * *
     *  @param Post $post *
     * @return Response */

    public function favoritePost(Post $post)
    {
        Auth::user()->favorites()->attach($post->id); return back();
    }

    /*
    * * Unfavorite a particular post * *
     *  @param Post $post *
     * @return Response */

    public function unFavoritePost(Post $post)
    {
        Auth::user()->favorites()->detach($post->id); return back();
    }
}
