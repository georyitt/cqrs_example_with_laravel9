<?php

namespace Src\Common\Domain;

interface QueryBus
{
    public function dispatch($query): mixed;
    public function map(array $map): void;
}
