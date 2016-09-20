<?php


namespace Bluecollar\Command;


use Illuminate\Foundation\Application;

/**
 * Class CommandBus
 * @package Bluecollar\Jobs\Commanding
 * @author John Kagga <johnkagga@gmail.com>
 */
class CommandBus
{
    /**
     * @var Application
     */
    private $app;
    /**
     * @var CommandTranslator
     */
    private $translator;

    /**
     * CommandBus constructor.
     * @param Application $app
     * @param CommandTranslator $translator
     */
    public function __construct(Application $app, CommandTranslator $translator)
    {
        $this->app = $app;
        $this->translator = $translator;
    }

    /**Translator the class name to handler class name.
     * Resolve the handler class out of the ioc container and call a handle
     * method on it passing it the command Object.
     *
     * @param $command
     * @return mixed
     * @throws \Exception
     */
    public function execute($command)
    {
        $handler = $this->translator->toCommandHandler($command);

        return $this->app->make($handler)->handle($command);
    }
}