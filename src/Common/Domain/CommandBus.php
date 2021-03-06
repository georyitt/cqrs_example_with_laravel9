<?php

namespace Src\Common\Domain;

interface CommandBus
{
    public function dispatch($command): void;
    public function map(array $map): void;
}
