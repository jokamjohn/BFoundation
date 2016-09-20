<?php


namespace Bluecollar\Traits\Event;


trait EventGenerator
{
    /**Array of events.
     *
     * @var array
     */
    protected $pendingEvents = [];

    /**Append new events to the array.
     *
     * @param $event
     */
    public function raise($event)
    {
        $this->pendingEvents[] = $event;
    }

    /**Get the pending events,
     * clear the pending events array
     * and return the events.
     *
     * @return array
     */
    public function releaseEvents()
    {
        $events = $this->pendingEvents;

        $this->pendingEvents = [];

        return $events;
    }
}