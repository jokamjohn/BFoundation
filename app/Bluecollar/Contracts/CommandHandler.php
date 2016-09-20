<?php


namespace Bluecollar\Contracts;

/**
 * Interface CommandHandler
 * @package Bluecollar\Commanding
 * @author John Kagga <johnkagga@gmail.com>
 */
interface CommandHandler
{
    /**The handle method every handler class show implement.
     *
     * @param $command
     * @return mixed
     */
    public function handle($command);
}