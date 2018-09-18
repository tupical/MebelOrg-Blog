<?php

namespace App\Http\Controllers\Api\V1;

use App\Http\Controllers\Controller;
use App\Models\Comment;
use App\Models\Post;
use App\Models\User;
use Illuminate\View\View;
use App\Http\Resources\Dashboard as DashboardResource;

class ShowDashboard extends Controller
{
    /**
     * Show the application admin dashboard.
     */
    public function show()
    {
        $value = new DashboardResource();
        return $valuse;
    }
}
