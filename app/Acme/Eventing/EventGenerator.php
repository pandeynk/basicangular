<?php

namespace Acme\Eventing;

trait EventGenerator
{
    protected $pendingEvents = [];

    /**
     * @param  mixed
     */
    public function raise($event)
    {
        $this->pendingEvents[] = $event;
    }

    public function releaseEvents()
    {
        $events = $this->pendingEvents;
        $this->pendingEvents = [];

        return $events;
    }
}
