<?php

namespace Acme\Jobs;

use Acme\Commanding\CommandHandler;
use Acme\Eventing\EventDispatcher;

/**
 * 
 */
class PostBlogCommandHandler implements CommandHandler
{
    protected $blog;
    protected $eventDispatcher;

    public function __construct(Blog  $blog, EventDispatcher $eventDispatcher)
    {
        $this->blog = $blog;
        $this->eventDispatcher = $eventDispatcher;
    }

    public function handle($command)
    {
        $blog = $this->blog->post(
                $command->title,
                $command->description
            );

        $this->eventDispatcher->dispatch($blog->releaseEvents());
        var_dump('Inside post blog command handler');
    }
}
