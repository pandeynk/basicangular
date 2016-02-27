<?php

namespace Acme\Eventing;

use ReflectionClass;

/**
 * EventListener : base class for listening all events.
 */
class EventListener
{
    /**
     * handles every event.
     *
     * @param [type] $event [description]
     *
     * @return [type] [description]
     */
    public function handle($event)
    {
        $eventName = $this->getEventName($event);
        if ($this->listenerIsRegistered($eventName)) {
            return call_user_func([$this, 'when'.$eventName], $event);
        }
        dd($eventName);
    }
    /**
     * [getEventName description].
     *
     * @param [type] $event [description]
     *
     * @return string [description]
     */
    public function getEventName($event)
    {
        return (new ReflectionClass($event))->getShortName();
    }
    /**
     * [listenerIsRegistered description].
     *
     * @param [type] $eventName [description]
     *
     * @return bool [description]
     */
    public function listenerIsRegistered($eventName)
    {
        $method = 'when'.$eventName;

        return method_exists($this, $method);
    }
}
