<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\Admin\PostsRequest;
use App\Models\MediaLibrary;
use App\Models\Post;
use App\Models\User;
use App\Models\Category;
use App\Models\Tag;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\View\View;
use Image;
use Storage;

class PostController extends Controller
{
    /**
     * Show the application posts index.
     */
    public function index(): View
    {
        return view('admin.posts.index', [
            'posts' => Post::withCount('comments', 'likes')->with('author')->latest()->paginate(50)
        ]);
    }

    /**
     * Display the specified resource edit form.
     */
    public function edit(Post $post): View
    {
        return view('admin.posts.edit', [
            'post' => $post,
            'users' => User::authors()->pluck('name', 'id'),
            'media' => MediaLibrary::first()->media()->get()->pluck('name', 'id'),
            'categories' => Category::get()->pluck('name', 'id'),
            'tags' => Tag::getTagStr($post),
        ]);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create(Request $request): View
    {
        return view('admin.posts.create', [
            'users' => User::authors()->pluck('name', 'id'),
            'media' => MediaLibrary::first()->media()->get()->pluck('name', 'id'),
            'categories' => Category::get()->pluck('name', 'id')
        ]);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(PostsRequest $request)
    {

        $post = Post::create($request->except(['view_count', 'featured_image']));
        if ($request->hasFile('featured_image'))
        {
            $image = $request->file('featured_image');
            $filename = time() . '.' . $image->getClientOriginalExtension();
            $location = storage_path('/images/post/' . $filename);
            Image::make($image)->resize(1600, 900)->save($location);
            $post->image = $filename;
        }
        if ($request->input('tags'))
        {
            Tag::createTag($request->input('tags'), $post);
        }
        
        $post->save();
        return redirect()->route('admin.posts.edit', $post)->withSuccess(__('posts.created'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(PostsRequest $request, Post $post): RedirectResponse
    {
        $oldPostauthor = $post->author_id;
        $post->update($request->except(['view_count', 'featured_image']));
        $post->tag()->detach();

        if ($request->hasFile('featured_image'))
        {
            $image = $request->file('featured_image');
            $filename = time() . '.' . $image->getClientOriginalExtension();
            $location = storage_path('/images/post/' . $filename);
            Image::make($image)->resize(368, 232)->save($location);
            $oldFilename = $post->image;

            $post->image = $filename;
            Storage::delete($oldFilename);
        }
        $post->save();
        if ($request->input('tags'))
        {
            Tag::createTag($request->input('tags'), $post);
        }
        
        return redirect()->route('admin.posts.edit', $post)->withSuccess(__('posts.updated'));
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Post  $post)
    {
        Storage::delete($post->image);
        $post->delete();

        return redirect()->route('admin.posts.index')->withSuccess(__('posts.deleted'));
    }
}
