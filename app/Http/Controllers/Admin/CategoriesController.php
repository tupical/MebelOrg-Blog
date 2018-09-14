<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\Admin\CategoryRequest;
use App\Models\Category;
use Illuminate\Http\RedirectResponse;
use Illuminate\View\View;
use Illuminate\Http\Request;
use Storage;
class CategoriesController extends Controller
{
    /**
     * Show the application comments index.
     */
    public function index(): View
    {
        return view('admin.categories.index', [
            'categories' => Category::latest()->paginate(50)
        ]);
    }

    public function create(): View
    {
        return view('admin.categories.create', [
            'category' => []
        ]);
    }

    public function store(CategoryRequest $request): RedirectResponse
    {
        $category = Category::create($request->except('featured_image'));
 
        $category->createImage($request);

        return redirect()->route('admin.categories.index');
    }

    public function edit(Category $category): View
    {
        return view('admin.categories.edit', [
            'category' => $category,
        ]);
    }

    public function update(CategoryRequest $request, Category $category): RedirectResponse
    {
        $category->update($request->except('featured_image'));
        
        $category->createImage($request);

        return redirect()->route('admin.categories.edit', $category);
    }

    public function destroy(Category $category): RedirectResponse
    {
        $category->deleteImage();
        $category->delete();
        
        return redirect()->route('admin.categories.index');
    }

    public function show(Category $category): View
    {
        return view('admin.categories.show', ['category' => $category]);
    }
}
