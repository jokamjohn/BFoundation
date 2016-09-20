<?php

namespace App\Listeners;

use App\Events\TrainingPublished;
use Illuminate\Queue\InteractsWithQueue;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Support\Facades\Log;

class SendTrainingNotification
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
     * @param  TrainingPublished  $event
     * @return void
     */
    public function handle(TrainingPublished $event)
    {
        \Log::debug("Training posted with ID: " . $event->training->id);
    }
}
