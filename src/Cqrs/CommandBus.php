<?php

namespace Src\Cqrs;

use Illuminate\Support\Facades\App;
use ReflectionClass;
use ReflectionException;
use Src\Cqrs\Contracts\Command;

class CommandBus
{
    /**
     * @throws ReflectionException
     */
    public function handle(Command $command) :bool
    {
        // resolve handler
        $reflection = new ReflectionClass($command);
        $handlerName = str_replace("Command", "CommandHandler", $reflection->getShortName());
        $handlerName = str_replace($reflection->getShortName(), $handlerName, $reflection->getName());

        $handler = App::make($handlerName);
        // invoke handler
        return ($handler)->execute($command);
    }
}
