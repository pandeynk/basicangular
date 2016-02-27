<?php

namespace Acme\Eventing;

use Illuminate\Events\Dispatcher;
use Illuminate\Log\Writer;

/**
 * EventDispatcher.
 */
class EventDispatcher
{
    protected $event;
    protected $log;
    /**
     * initializes Dispatcher and Logger.
     *
     * @param Dispatcher $dispatcher [description]
     * @param Writer     $log        [description]
     */
    public function __construct(Dispatcher $dispatcher, Writer $log)
    {
        $this->event = $dispatcher;
        $this->log = $log;
    }
    /**
     * @param  array
     *
     * @return [type]
     */
    public function dispatch(array $events)
    {
        foreach ($events as $event) {
            $eventName = str_replace('\\', '.', get_class($event));
            $this->event->fire($eventName, $event);
            $this->log->info('Event was fired');
            echo "Event $eventName was fired";
        }
    }
}
