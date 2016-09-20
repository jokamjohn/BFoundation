<?php


namespace Bluecollar\Command;

use Exception;

/**
 * Class CommandTranslator
 * @package Bluecollar\Jobs\Commanding
 * @author John Kagga <johnkagga@gmail.com>
 */
class CommandTranslator
{
    /**Change the class name to handler name.
     * Check whether the handler class exists if not throw an exception.
     *
     * @param $command
     * @return mixed
     * @throws Exception
     */
    public function toCommandHandler($command)
    {
        $handle = get_class($command); //PostJobListingCommand
        $handler = str_replace('Command', 'CommandHandler', $handle); //PostJobListingCommandHandler.

        if (!class_exists($handler)) {
            $message = "Command handler [$handler] does not exist";

            throw new Exception($message);
        }

        return $handler;
    }
}