<?php

namespace Acme\Jobs;

/**
 * JobWasPosted.
 */
class BlogWasPosted
{
    protected $blog;
    public function __construct(Blog $blog)
    {
        $this->blog = $blog;
    }
}
