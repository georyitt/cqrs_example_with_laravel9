<?php

namespace Src\Common\Domain\Bus\Query;

interface QueryHandler {
    public function execute(Query $request): mixed;
}
