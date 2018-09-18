<?php

namespace App\Http\Controllers\Api\V1;

use App\Http\Controllers\Controller;
use App\Models\Category;    
use Illuminate\Http\Response;
use App\Http\Resources\Category as CategoryResource;
use Illuminate\Http\Request;
use App\Http\Requests\Admin\CategoryRequest;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\Resources\Json\ResourceCollection;


class CategoryController extends Controller
{
    /**
     * Unset the category's thumbnail.
     */
    public function destroyImage(Category $category): CategoryResource
    {
        $category->deleteImage();
        $category->image = null;
        $category->update(['image']);  
        return new CategoryResource($category);
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





}
