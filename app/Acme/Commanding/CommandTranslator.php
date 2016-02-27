<?php

namespace Acme\Commanding;

use Exception;

/**
 * 
 */
class CommandTranslator
{
    public function toCommandHandler($command)
    {
        $handler = str_replace('Command', 'CommandHandler', get_class($command));
        if (!class_exists($handler)) {
            $message = "Handler class [$handler] does not exits.";
            throw new Exception($message);
        }

        return $handler;
    }
}
