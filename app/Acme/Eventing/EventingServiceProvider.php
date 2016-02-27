<?php

namespace Acme\Eventing;

use Illuminate\Support\ServiceProvider;

/**
 * EventingServiceProvider.
 */
class EventingServiceProvider extends ServiceProvider
{
    /**
     * registers the listeners.
     */
    public function register()
    {
        $listeners = $this->app['config']->get('acme.listeners');
        foreach ($listeners as $listener) {
            $this->app['events']->listen('Acme.*', $listener);
        }
    }
}
