<?php

namespace Src\Common\Domain\Bus\Command;

interface CommandHandler {
    public function execute(Command $request): mixed;
}
