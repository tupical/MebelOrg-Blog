<?php

namespace App\Http\Resources;

use Illuminate\Http\Resources\Json\Resource;

class Dashboard extends Resource
{
        public function toArray($request): array
    {
        return [
            'title' => 'dashboard',
        ];
    }
}