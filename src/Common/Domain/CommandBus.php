<?php

namespace Src\Common\Domain;

interface CommandBus
{
    public function dispatch($command): mixed;
    public function map(array $map): void;
}
