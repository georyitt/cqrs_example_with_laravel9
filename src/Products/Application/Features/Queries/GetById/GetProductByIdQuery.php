<?php

namespace Src\Products\Application\Features\Queries\GetById;

use Src\Common\Domain\Bus\Query\Query;

class GetProductByIdQuery implements Query
{
    public function __construct(public int $id) {}
}
