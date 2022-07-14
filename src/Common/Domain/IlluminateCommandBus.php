<?php

namespace Src\Common\Domain;

use Illuminate\Bus\Dispatcher;

class IlluminateCommandBus implements CommandBus
{
    public function __construct(private readonly Dispatcher $bus) {}

    public function dispatch($command): mixed
    {
        return $this->bus->dispatch($command);
    }

    public function map(array $map): void
    {
        $this->bus->map($map);
    }
}
