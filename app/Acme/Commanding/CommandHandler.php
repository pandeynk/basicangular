<?php

namespace Acme\Commanding;

/**
 * 
 */
interface CommandHandler
{
    public function handle($command);
}
