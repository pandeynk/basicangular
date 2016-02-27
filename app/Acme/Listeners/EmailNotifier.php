<?php

namespace Acme\Listeners;

use Acme\Jobs\BlogWasPosted;
use Acme\Eventing\EventListener;

/**
 * EmailNotifier : to notify email when event is fired.
 */
class EmailNotifier extends EventListener
{
    public function whenBlogWasPosted(BlogWasPosted $event)
    {
        var_dump('Confirmational email was sent about : '.$event->blog->title);
    }
}
