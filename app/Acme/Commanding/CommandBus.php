<?php

namespace Acme\Commanding;

use Illuminate\Foundation\Application;

/**
 * 
 */
class CommandBus
{
    protected $app;
    protected $commandTranslator;

    public function __construct(Application $app, CommandTranslator $commandTranslator)
    {
        $this->app = $app;
        $this->commandTranslator = $commandTranslator;
    }

    public function execute($command)
    {
        $handler = $this->commandTranslator->toCommandHandler($command);

        return $this->app->make($handler)->handle($command);
    }
}
