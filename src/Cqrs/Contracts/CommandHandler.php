<?php

namespace Src\Cqrs\Contracts;

interface CommandHandler
{
    public function execute(Command $command): bool;
}
