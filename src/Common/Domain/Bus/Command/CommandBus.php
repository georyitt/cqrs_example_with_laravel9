<?php

namespace Src\Common\Domain\Bus\Command;

use Illuminate\Support\Facades\App;
use ReflectionClass;

class CommandBus
{
    public function handle(Command $request): mixed
    {
        return $this->invokeHandler($request)->execute($request);
    }

    private function invokeHandler(Command $request): CommandHandler {
        $reflection = new ReflectionClass($request);
        $handlerName = str_replace("Command", "CommandHandler", $reflection->getShortName());
        $handlerName = str_replace($reflection->getShortName(), $handlerName, $reflection->getName());
        return App::make($handlerName);
    }
}
