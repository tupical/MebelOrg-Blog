<?php

namespace App\Http\Controllers\Api\V1;

use App\Http\Controllers\Controller;
use App\Models\Category;    
use Illuminate\Http\Response;
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
}
