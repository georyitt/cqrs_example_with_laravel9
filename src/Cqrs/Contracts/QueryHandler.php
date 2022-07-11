<?php

namespace Src\Cqrs\Contracts;

interface QueryHandler
{
    public function execute(Query $query): mixed;
}
