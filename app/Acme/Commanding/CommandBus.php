<?php

namespace Acme\Commanding;

use Illuminate\Foundation\Application;

/**
 * Command Bus Class, to move data from command to command handler.
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
