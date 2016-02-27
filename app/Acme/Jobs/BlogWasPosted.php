<?php

namespace Acme\Jobs;

/**
 * JobWasPosted.
 */
class BlogWasPosted
{
    public $blog;
    public function __construct(Blog $blog)
    {
        $this->blog = $blog;
    }
}
