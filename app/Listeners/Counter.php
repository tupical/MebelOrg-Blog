<?php

namespace App\Listeners;

use App\Events\PostHasViewed;
use Illuminate\Queue\InteractsWithQueue;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Http\Request;
class Counter
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
     * @param  PostHasViewed  $event
     * @return void
     */
    public function handle(PostHasViewed $event)
    {
        session_start();
        if (!isset($_SESSION['has_views']))
        {
            $_SESSION['has_views'] = array();
        }
        
        if (!in_array($event->post->id, $_SESSION['has_views']))
        {
            $event->post->increment('view_count');
            array_push ($_SESSION['has_views'], $event->post->id);
        }

        session_write_close();
    }
}
