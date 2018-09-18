<?php

namespace App\Policies;

use App\Models\Category;
use App\Models\User;
use Illuminate\Auth\Access\HandlesAuthorization;

class CategoryPolicy
{
    use HandlesAuthorization;

    /**
     * Determine whether the user is admin for all authorization.
     */
    public function before(User $user)
    {
        if ($user->isAdmin()) {
            return true;
        }
    }

    /**
     * Determine whether the user can update the Category.
     */
    public function update(User $user, Category $Category): bool
    {
        return $user->isAdmin();
    }

    /**
     * Determine whether the user can store a Category.
     */
    public function store(User $user): bool
    {
        return $user->isAdmin();
    }

    /**
     * Determine whether the user can delete the Category.
     */
    public function delete(User $user, Category $Category): bool
    {
        return $user->isAdmin();
    }

    public function destroyImage(User $user, Category $Category): bool
    {
        return $user->isAdmin();
    }
}
