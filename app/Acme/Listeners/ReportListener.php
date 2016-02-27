<?php

namespace Acme\Listeners;

use Acme\Eventing\EventListener;

/**
 * ReportListener.
 */
class ReportListener extends EventListener
{
    /**
     * [whenJobWasPosted description].
     *
     * @param [type] $event [description]
     *
     * @return [type] [description]
     */
    public function whenBlogWasPosted($event)
    {
        var_dump('Do something related to reporting');
    }
}
