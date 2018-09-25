<?php

namespace App\Http\Controllers\Api\Posts;

use App\Http\Controllers\Controller;  
use Illuminate\Http\Response;
use Illuminate\Http\Request;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\Resources\Json\ResourceCollection;


class TestController extends Controller
{
    public function func()
    {
        return 'test';
    }
}