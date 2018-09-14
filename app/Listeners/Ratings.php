<?php

namespace App\Listeners;

use App\Events\PostHasRating;
use Illuminate\Queue\InteractsWithQueue;
use Illuminate\Contracts\Queue\ShouldQueue;
use App\Models\Post;
class Ratings
{
    /**
     * Create the event listener.
     *
     * @return void
     */
    public function __construct()
    {
        //
    }

    /**
     * Handle the event.
     *
     * @param  PostHasRating  $event
     * @return void
     */
    public function handle(PostHasRating $event)
    {
       
    }
}
