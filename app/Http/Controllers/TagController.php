<?php

namespace App\Http\Controllers;

use App\Models\Tag;
use App\Models\Category;
use Illuminate\Http\Request;
use Illuminate\View\View;

class TagController extends Controller
{
    /**
     * Show the application dashboard.
     */
    public function show(Request $request, Tag $tag)//: View
    {
        $categories = Category::get();
        $posts = $tag->posts()->paginate(30);

        return view('tags.show', [
            'tag' => $tag,
            'posts' => $posts,
            'categories' => $categories
        ]);
    }
}
