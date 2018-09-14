<?php

namespace App\Http\Controllers;

use App\Models\Post;
use Illuminate\Http\Request;
use Illuminate\View\View;
use App\Models\Category;

class CategoriesController extends Controller
{
    /**
     * Show the application dashboard.
     */
    public function index(Request $request): View
    {
        return view('categories.index', [
            'categories' => Category::all()
        ]);
    }

    public function show(Category $category): View
    {

        $categories = Category::where('id', '!=', $category->id)->get();
        $limit = $category->post_count;
        return view('categories.show', [
            'category' => $category,
            'categories' => $categories,
            'posts' => Post::where('category_id', $category->id)
                            ->where('posted_at', '<=', NOW())
                            ->paginate(30)
        ]);
    }

    public function tag_show(Tag $tag): View
    {
        $categories = Category::get();
        return view('categories.show', [
            'category' => $tag,
            'categories' => $categories,
            'posts' => Post::tag($tag->id)->get()
        ]);
    }
}
