<?php

namespace App\Observers;

use App\Models\Category;

class CategoryObserver
{
    /**
     * Listen to the Category saving event.
     */
    public function saving(Category $category): void
    {
        $category->slug = str_slug($category->name, '-');
    }
}
