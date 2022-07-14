<?php

namespace Src\Common\Domain;

use Illuminate\Bus\Dispatcher;

class IlluminateQueryBus implements QueryBus
{
    public function __construct(private readonly Dispatcher $bus) {}

    public function dispatch($query): mixed
    {
        return $this->bus->dispatch($query);
    }

    public function map(array $map): void
    {
        $this->bus->map($map);
    }
}
