<?php

namespace App\Listeners;

use App\Events\JobPublished;
use Illuminate\Queue\InteractsWithQueue;
use Illuminate\Contracts\Queue\ShouldQueue;

class SendJobNotification
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
     * @param  JobPublished  $event
     * @return void
     */
    public function handle(JobPublished $event)
    {
        \Log::debug("Event fired with ID: " . $event->job->id);
    }
}
