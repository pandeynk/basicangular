<?php

namespace Acme\Jobs;

use Acme\Commanding\CommandHandler;
use Acme\Eventing\EventDispatcher;

/**
 * 
 */
class PostBlogCommandHandler implements CommandHandler
{
    protected $eventDispatcher;

    public function __construct(EventDispatcher $eventDispatcher)
    {
        $this->eventDispatcher = $eventDispatcher;
    }
    /**
     * handles command.
     *
     * @param [type] $command [description]
     *
     * @return [type] [description]
     */
    public function handle($command)
    {
        $blog = Blog::post($command->title, $command->description);

        $this->eventDispatcher->dispatch($blog->releaseEvents());
        var_dump('Inside post blog command handler');
    }
}
