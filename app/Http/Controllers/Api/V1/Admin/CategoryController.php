<?php

namespace App\Http\Controllers\Api\V1\Admin;

use App\Http\Controllers\Controller;
use App\Models\Category;    
use Illuminate\Http\Response;
use App\Http\Resources\Category as CategoryResource;
use Illuminate\Http\Request;
use App\Http\Requests\Admin\CategoryRequest;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\Resources\Json\ResourceCollection;
use Illuminate\Support\Facades\Auth;


class CategoryController extends Controller
{
    /**
     * Unset the category's thumbnail.
     */
    public function destroyImage(Category $category): String
    {
        $category->deleteImage();
        $category->image = null;
        return $category->update(['image']);  
    }

    public function show(Category $category)
    {
        return new CategoryResource($category);
    }

    public function index(Request $request): ResourceCollection
    {
        return CategoryResource::collection(
            Category::all()
        );
    }

    public function store(CategoryRequest $request)
    {
        $this->authorize('store', Category::class);

        return new CategoryResource(
            Category::create($request->only(['name', 'description']))
        );
    }

    public function update(CategoryRequest $request, Category $category)
    {
        $this->authorize('update', $category);

        $category->update($request->only(['name', 'description']));

        return new CategoryResource($category);
    }

    public function destroy(Category $category): JsonResponse
    {
        $this->authorize('delete', $category);

        $category->delete();

        return response()->noContent();
    }
}
